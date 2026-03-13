package handler

import (
	"fmt"
	"net/http"
	"strings"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/utils"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/blog"
)

type BlogHandler struct {
	APIClient *utils.Client
}

// Handler-i yaradan funksiya (NewClient artıq localhost:8080-i tanıyır)
func NewBlogHandler() *BlogHandler {
	return &BlogHandler{
		APIClient: utils.NewClient(),
	}
}

func (h *BlogHandler) CreateForm(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path
	layout.Base(blog.BlogCreate(), path).Render(r.Context(), w)
}

func (h *BlogHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path
	ctx := r.Context()

	blogs, err := utils.Get[[]model.BlogPost](h.APIClient, "/blogs")
	if err != nil {
		fmt.Printf("Blog xətası: %v\n", err)
		http.Error(w, "Bloglar yüklənə bilmədi", http.StatusInternalServerError)
		return
	}

	if r.Header.Get("HX-Request") == "true" {
		blog.BlogList(blogs).Render(ctx, w)
		return
	}

	layout.Base(blog.BlogList(blogs), path).Render(r.Context(), w)
}

func (h *BlogHandler) Delete(w http.ResponseWriter, r *http.Request) {
	// URL-dən ID çıxarmaq
	pathParts := strings.Split(r.URL.Path, "/")
	idStr := pathParts[len(pathParts)-1]

	// Real API-dan silmək üçün Delete metodunu çağırırıq
	_, err := utils.Delete[any](h.APIClient, "/blogs/"+idStr)
	if err != nil {
		fmt.Printf("Silmə xətası: %v\n", err)
		http.Error(w, "Silmək mümkün olmadı", http.StatusInternalServerError)
		return
	}

	// Silinmədən sonra güncəl siyahını çəkirik
	blogs, _ := utils.Get[[]model.BlogPost](h.APIClient, "/blogs")

	// Siyahını yenidən render et (HTMX üçün)
	blog.BlogList(blogs).Render(r.Context(), w)
}
