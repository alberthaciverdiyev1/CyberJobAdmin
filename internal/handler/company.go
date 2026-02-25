package handler

import (
	"net/http"
	"time"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/utils"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/company"
)

type CompanyHandler struct{}

func (h *CompanyHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path

	companies := []model.Company{
		{
			ID: 1, Name: "VTB Bank", TotalAds: 245, ActiveAds: 245,
			IsVisible: true, IsVerified: true, CreatedAt: utils.ParseDate("22.10.2025"),
		},
		{
			ID: 2, Name: "Müqavilə Layihəsi.pdf", TotalAds: 956, ActiveAds: 956,
			IsVisible: true, IsVerified: true, CreatedAt: utils.ParseDate("20.10.2025"),
		},
		{
			ID: 3, Name: "Ataşgah sığorta", TotalAds: 128, ActiveAds: 128,
			IsVisible: false, IsVerified: false, CreatedAt: utils.ParseDate("18.10.2025"),
		},
		{
			ID: 4, Name: "İDDA", TotalAds: 2, ActiveAds: 2,
			IsVisible: true, IsVerified: true, CreatedAt: utils.ParseDate("15.10.2025"),
		},
		{
			ID: 5, Name: "Azərbaycan Dəmir yolları", TotalAds: 12, ActiveAds: 12,
			IsVisible: false, IsVerified: false, CreatedAt: utils.ParseDate("12.10.2025"),
		},
		{
			ID: 6, Name: "Afea group", TotalAds: 567, ActiveAds: 567,
			IsVisible: false, IsVerified: false, CreatedAt: utils.ParseDate("10.10.2025"),
		},
		{
			ID: 7, Name: "Birmarket", TotalAds: 892, ActiveAds: 892,
			IsVisible: false, IsVerified: false, CreatedAt: utils.ParseDate("08.10.2025"),
		},
		{
			ID: 8, Name: "Company", TotalAds: 3, ActiveAds: 3,
			IsVisible: true, IsVerified: true, CreatedAt: utils.ParseDate("05.10.2025"),
		},
	}

	if r.Header.Get("HX-Request") == "true" {
		company.CompanyList(companies).Render(r.Context(), w)
		return
	}

	layout.Base(company.CompanyList(companies), path).Render(r.Context(), w)
}

func (h *CompanyHandler) New(w http.ResponseWriter, r *http.Request) {
	company.CompanyForm(nil).Render(r.Context(), w)
}

func (h *CompanyHandler) Save(w http.ResponseWriter, r *http.Request) {
	if err := r.ParseForm(); err != nil {
		http.Error(w, "Bad Request", http.StatusBadRequest)
		return
	}

	newComp := model.Company{
		ID:         100,
		Name:       r.FormValue("name"),
		CreatedAt:  time.Now(),
		TotalAds:   0,
		ActiveAds:  0,
		IsVisible:  true,
		IsVerified: false,
	}

	company.CompanyRow(newComp).Render(r.Context(), w)
}
