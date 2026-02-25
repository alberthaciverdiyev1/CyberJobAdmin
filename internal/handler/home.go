package handler

import (
	"net/http"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages"
)

type HomeHandler struct {
}

func (h *HomeHandler) Index(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path
	layout.Base(pages.Home(), path).Render(r.Context(), w)
}

func (h *HomeHandler) Dashboard(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path

	stats := model.DashboardStats{
		TotalJobCount:     248,
		TotalCompanyCount: 248,
		PremiumJobCount:   58,
		BannerCount:       58,
	}

	companies := []model.CompanySummary{
		{Name: "AccessBank QSC", Date: "22 Oktyabr 2025", JobCount: 10, PremiumJobCount: 5},
		{Name: "Azərbaycan Sənaye Bankı ASC", Date: "20 Oktyabr 2025", JobCount: 5, PremiumJobCount: 0},
		{Name: "Bank Avrasiya ASC", Date: "18 Oktyabr 2025", JobCount: 20, PremiumJobCount: 2},
		{Name: "VTB Bank", Date: "15 Oktyabr 2025", JobCount: 49, PremiumJobCount: 19},
		{Name: "İrşad", Date: "12 Oktyabr 2025", JobCount: 50, PremiumJobCount: 9},
		{Name: "ABC-Telecom", Date: "10 Oktyabr 2025", JobCount: 30, PremiumJobCount: 3},
	}

	if r.Header.Get("HX-Request") == "true" {
		pages.Dashboard(stats, companies).Render(r.Context(), w)
		return
	}
	layout.Base(pages.Dashboard(stats, companies), path).Render(r.Context(), w)
}
