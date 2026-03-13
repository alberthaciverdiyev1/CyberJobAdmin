package handler

import (
	"fmt"
	"io"
	"net/http"
	"os"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/model"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/utils"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/view/layout"
	pages "github.com/alberthaciverdiyev1/CyberJobAdmin/view/pages/banner"
)

type BannerHandler struct {
	APIClient *utils.Client
}

func NewBannerHandler() *BannerHandler {
	return &BannerHandler{
		APIClient: utils.NewClient(),
	}
}

func (h *BannerHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path
	ctx := r.Context()

	banners, err := utils.Get[[]model.Banner](h.APIClient, "/banners")
	if err != nil {
		fmt.Printf("Xəta: %v\n", err)
		http.Error(w, "Bannerlər yüklənə bilmədi", http.StatusInternalServerError)
		return
	}

	if r.Header.Get("HX-Request") == "true" {
		pages.BannerList(banners).Render(ctx, w)
		return
	}
	layout.Base(pages.BannerList(banners), path).Render(ctx, w)
}

func (h *BannerHandler) New(w http.ResponseWriter, r *http.Request) {
	pages.BannerForm(nil).Render(r.Context(), w)
}

func (h *BannerHandler) Save(w http.ResponseWriter, r *http.Request) {
	if err := r.ParseMultipartForm(10 << 20); err != nil {
		http.Error(w, "Fayl çox böyükdür", http.StatusBadRequest)
		return
	}

	//link := r.FormValue("link")
	//location := r.FormValue("location")
	//isDesktop := r.FormValue("is_desktop") == "on"

	file, header, err := r.FormFile("image")
	if err == nil {
		defer file.Close()
		filePath := "static/uploads/" + header.Filename
		dst, err := os.Create(filePath)
		if err == nil {
			defer dst.Close()
			io.Copy(dst, file)
		}
	}

	// Backend API-a real POST göndərmək üçün:
	/*
	   newBanner := model.Banner{
	       Link:      link,
	       Location:  location,
	       IsDesktop: isDesktop,
	       // ImagePath: filePath, // Ehtiyac varsa
	   }
	   _, err = utils.Post[model.Banner](h.APIClient, "/banners", newBanner)
	*/

	w.Header().Set("HX-Trigger", "banners-updated")
	w.WriteHeader(http.StatusOK)
	w.Write([]byte("Uğurla yadda saxlanıldı!"))
}
