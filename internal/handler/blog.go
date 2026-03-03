package handler

import (
	"fmt"
	"net/http"
	"strconv"
	"strings"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/blog"
)

type BlogHandler struct{}

// Mock Data
var fakeBlogs = []model.BlogPost{
	{
		ID:       1,
		Title:    "Proqramlaşdırma Dillərinin Gələcəyi",
		Date:     "21.01.2026",
		ImageURL: "https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=2070",
	},
	{
		ID:       2,
		Title:    "Kibertəhlükəsizlikdə Yeni Trendlər",
		Date:     "15.01.2026",
		ImageURL: "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070",
	},
}

func (h *BlogHandler) CreateForm(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path

	fmt.Println(path)
	layout.Base(blog.BlogCreate(), path).Render(r.Context(), w)
}

func (h *BlogHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path

	if r.Header.Get("HX-Request") == "true" {
		blog.BlogList(fakeBlogs).Render(r.Context(), w)
		return
	}

	layout.Base(blog.BlogList(fakeBlogs), path).Render(r.Context(), w)
}

func (h *BlogHandler) Delete(w http.ResponseWriter, r *http.Request) {
	// URL-dən ID çıxarmaq (net/http standart)
	pathParts := strings.Split(r.URL.Path, "/")
	idStr := pathParts[len(pathParts)-1]
	id, _ := strconv.Atoi(idStr)

	// Mock silmə
	for i, b := range fakeBlogs {
		if b.ID == uint(id) {
			fakeBlogs = append(fakeBlogs[:i], fakeBlogs[i+1:]...)
			break
		}
	}

	// Siyahını yenidən render et
	blog.BlogList(fakeBlogs).Render(r.Context(), w)
}
