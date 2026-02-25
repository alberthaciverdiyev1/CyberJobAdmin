package handler

import (
	"net/http"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages"
)

type HomeHandler struct {
}

func (h *HomeHandler) Index(w http.ResponseWriter, r *http.Request) {
	layout.Base(pages.Home()).Render(r.Context(), w)
}

func (h *HomeHandler) Dashboard(w http.ResponseWriter, r *http.Request) {
	if r.Header.Get("HX-Request") == "true" {
		pages.Home().Render(r.Context(), w)
		return
	}
	layout.Base(pages.Home()).Render(r.Context(), w)
}
