package handler

import (
	"fmt"
	"io"
	"net/http"
	"os"
	"time"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	pages "github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/banner"
)

func parseDate(s string) time.Time {
	t, _ := time.Parse("02.01.06", s)
	return t
}

type BannerHandler struct{}

func (h *BannerHandler) List(w http.ResponseWriter, r *http.Request) {
	data := []model.Banner{
		{
			Image:    "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=200",
			Location: "Ana səhifə", Link: "cyberjob/company.html",
			StartAt: parseDate("21.12.25"), EndAt: parseDate("21.01.26"), IsActive: true,
		},
		{
			Image:    "https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=200",
			Location: "Vakansiya list", Link: "cyberjob/company.html",
			StartAt: parseDate("21.12.25"), EndAt: parseDate("21.01.26"), IsActive: true,
		},
		{
			Image:    "https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=200",
			Location: "Ana səhifə-2", Link: "cyberjob/company.html",
			StartAt: parseDate("01.11.25"), EndAt: parseDate("21.12.26"), IsActive: false,
		},
	}

	if r.Header.Get("HX-Request") == "true" {
		pages.BannerList(data).Render(r.Context(), w)
		return
	}
	layout.Base(pages.BannerList(data)).Render(r.Context(), w)
}

func (h *BannerHandler) New(w http.ResponseWriter, r *http.Request) {
	pages.BannerForm(nil).Render(r.Context(), w)
}

func (h *BannerHandler) Save(w http.ResponseWriter, r *http.Request) {
	// 1. Dosya ve form verilerini parse et (Max 10MB)
	if err := r.ParseMultipartForm(10 << 20); err != nil {
		http.Error(w, "Fayl çox böyükdür", http.StatusBadRequest)
		return
	}

	// 2. Form verilerini al
	link := r.FormValue("link")
	location := r.FormValue("location")
	isDesktop := r.FormValue("is_desktop") == "on"

	// 3. Dosyayı (Resmi) oku
	file, header, err := r.FormFile("image")
	if err == nil {
		defer file.Close()

		// Dosyayı static/uploads altına kaydet
		filePath := "static/uploads/" + header.Filename
		dst, _ := os.Create(filePath)
		defer dst.Close()
		io.Copy(dst, file)
		fmt.Printf("Resim kaydedildi: %s\n", filePath)
	}

	// 4. Veritabanına Kayıt (Şimdilik Log basalım)
	fmt.Printf("Yeni Banner: Link: %s, Yer: %s, Desktop: %v\n", link, location, isDesktop)

	// 5. Başarılı olduktan sonra HTMX ile sayfayı yenile
	// Tarayıcıya 'banners-updated' eventi göndererek tabloyu yeniletebiliriz
	w.Header().Set("HX-Trigger", "banners-updated")
	w.WriteHeader(http.StatusOK)
	w.Write([]byte("Uğurla yadda saxlanıldı!"))
}
