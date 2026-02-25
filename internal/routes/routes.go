package routes

import (
	"net/http"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/handler"
	"github.com/go-chi/chi/v5"
	"github.com/go-chi/chi/v5/middleware"
)

func NewRouter(homeHdl *handler.HomeHandler, bannerHdl *handler.BannerHandler) *chi.Mux {
	r := chi.NewRouter()

	r.Use(middleware.Logger)
	r.Use(middleware.Recoverer)

	fs := http.FileServer(http.Dir("static"))
	r.Handle("/static/*", http.StripPrefix("/static/", fs))

	r.Get("/", homeHdl.Index)
	r.Get("/dashboard", homeHdl.Dashboard)

	r.Get("/banners", bannerHdl.List)
	r.Get("/banners/new", bannerHdl.New)
	r.Post("/banners", bannerHdl.Save)

	return r
}
