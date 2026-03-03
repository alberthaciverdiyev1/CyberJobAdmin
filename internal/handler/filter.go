package handler

import (
	"net/http"
	"strconv"
	"strings"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/filter"
)

type FilterHandler struct{}

// Mock Data
var fakeFilters = []model.FilterFullResponse{
	{ID: 1, Key: "job_type", NameAz: "İş rejimi", NameEn: "Job Type", NameRu: "Тип работы"},
	{ID: 2, Key: "salary", NameAz: "Maaş", NameEn: "Salary", NameRu: "Зарплата"},
	{ID: 3, Key: "experience", NameAz: "Təcrübə", NameEn: "Experience", NameRu: "Опыт"},
}

func (h *FilterHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path

	// Əgər HTMX sorğusudursa yalnız səhifənin içini qaytar
	if r.Header.Get("HX-Request") == "true" {

		filter.FiltersPage(fakeFilters).Render(r.Context(), w)
		return
	}

	// Normal sorğudursa layout ilə birlikdə render et
	layout.Base(filter.FiltersPage(fakeFilters), path).Render(r.Context(), w)
}

func (h *FilterHandler) Save(w http.ResponseWriter, r *http.Request) {
	if err := r.ParseForm(); err != nil {
		http.Error(w, "Bad Request", http.StatusBadRequest)
		return
	}

	// Modelinə uyğun yeni filter yarat (Simulyasiya)
	newFilter := model.FilterFullResponse{
		ID:     uint(len(fakeFilters) + 1),
		Key:    r.FormValue("key"),
		NameAz: r.FormValue("name_az"),
		NameEn: r.FormValue("name_en"),
		NameRu: r.FormValue("name_ru"),
	}

	// Real bazada bura Save() gələcək, hələlik siyahıya əlavə edirik
	fakeFilters = append(fakeFilters, newFilter)

	// HTMX-ə cavab olaraq bütün siyahını qaytarırıq ki, content-area yenilənsin
	filter.FiltersPage(fakeFilters).Render(r.Context(), w)
}

func (h *FilterHandler) Delete(w http.ResponseWriter, r *http.Request) {
	// Standard net/http-də URL param almaq üçün (/api/filters/1)
	pathParts := strings.Split(r.URL.Path, "/")
	idStr := pathParts[len(pathParts)-1]
	id, _ := strconv.Atoi(idStr)

	// Silmə simulyasiyası
	for i, f := range fakeFilters {
		if f.ID == uint(id) {
			fakeFilters = append(fakeFilters[:i], fakeFilters[i+1:]...)
			break
		}
	}

	// Siyahını yenidən render edirik
	filter.FiltersPage(fakeFilters).Render(r.Context(), w)
}
