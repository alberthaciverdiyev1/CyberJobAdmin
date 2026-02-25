package handler

import (
	"net/http"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	pages "github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/banner"
)

type BannerHandler struct {
}

func (h *BannerHandler) List(w http.ResponseWriter, r *http.Request) {
	data := []pages.Banner{
		{
			Image:    "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=200",
			Location: "Ana səhifə", Link: "cyberjob/company.html",
			StartAt: "21.12.25", EndAt: "21.01.26", IsActive: true,
		},
		{
			Image:    "https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=200",
			Location: "Vakansiya list", Link: "cyberjob/company.html",
			StartAt: "21.12.25", EndAt: "21.01.26", IsActive: true,
		},
		{
			Image:    "https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=200",
			Location: "Ana səhifə-2", Link: "cyberjob/company.html",
			StartAt: "01.11.25", EndAt: "21.12.26", IsActive: false,
		},
	}

	if r.Header.Get("HX-Request") == "true" {
		pages.BannerList(data).Render(r.Context(), w)
		return
	}
	layout.Base(pages.BannerList(data)).Render(r.Context(), w)
}
