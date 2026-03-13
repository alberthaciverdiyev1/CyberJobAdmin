package handler

import (
	"fmt"
	"net/http"
	"strconv"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/utils"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/category"
	"github.com/go-chi/chi/v5"
)

type CategoryHandler struct {
	APIClient *utils.Client
}

func NewCategoryHandler() *CategoryHandler {
	return &CategoryHandler{
		APIClient: utils.NewClient(),
	}
}

func (h *CategoryHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path
	ctx := r.Context()

	categories, err := utils.Get[[]model.CategoryResponse](h.APIClient, "/categories")
	if err != nil {
		categories = []model.CategoryResponse{}
	}

	if r.Header.Get("HX-Request") == "true" {
		category.CategoryList(categories).Render(ctx, w)
		return
	}

	layout.Base(category.CategoryList(categories), path).Render(ctx, w)
}

func (h *CategoryHandler) CreateView(w http.ResponseWriter, r *http.Request) {
	parents, _ := utils.Get[[]model.CategoryResponse](h.APIClient, "/categories/simple")

	category.CategoryCreateForm(parents).Render(r.Context(), w)
}

func (h *CategoryHandler) Create(w http.ResponseWriter, r *http.Request) {
	ctx := r.Context()

	name := r.FormValue("name")
	icon := r.FormValue("icon")
	parentIDStr := r.FormValue("parent_id")

	var parentID *uint
	if parentIDStr != "" {
		if id, err := strconv.ParseUint(parentIDStr, 10, 32); err == nil {
			uID := uint(id)
			parentID = &uID
		}
	}

	req := model.CreateCategoryRequest{
		Name:     name,
		Icon:     icon,
		ParentID: parentID,
	}

	newCategory, err := utils.Post[model.CategoryResponse](h.APIClient, "/categories", req)
	if err != nil {
		w.WriteHeader(http.StatusInternalServerError)
		w.Write([]byte("API Xətası: " + err.Error()))
		return
	}

	category.CategoryRow(newCategory, 0).Render(ctx, w)
}

func (h *CategoryHandler) Delete(w http.ResponseWriter, r *http.Request) {
	idStr := chi.URLParam(r, "id")

	_, err := utils.Delete[any](h.APIClient, fmt.Sprintf("/categories/%s", idStr))
	if err != nil {
		w.WriteHeader(http.StatusInternalServerError)
		return
	}

	w.WriteHeader(http.StatusOK)
}

func (h *CategoryHandler) UpdateView(w http.ResponseWriter, r *http.Request) {
	idStr := chi.URLParam(r, "id")

	cat, err := utils.Get[model.CategoryResponse](h.APIClient, "/categories/"+idStr)
	if err != nil {
		w.WriteHeader(http.StatusInternalServerError)
		return
	}
	parents, _ := utils.Get[[]model.CategoryResponse](h.APIClient, "/categories/simple")

	category.CategoryUpdateForm(cat, parents).Render(r.Context(), w)
}

//func (h *CategoryHandler) Update(w http.ResponseWriter, r *http.Request) {
//	idStr := chi.URLParam(r, "id")
//}
