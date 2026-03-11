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

type BannerHandler struct{}

func (h *BannerHandler) List(w http.ResponseWriter, r *http.Request) {
	path := r.URL.Path
	ctx := r.Context()

	banners, err := utils.FetchAPI[[]model.Banner]("http://localhost:8080/banners")
	if err != nil {
		http.Error(w, "Banners Could Not Loaded", http.StatusInternalServerError)
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

	link := r.FormValue("link")
	location := r.FormValue("location")
	isDesktop := r.FormValue("is_desktop") == "on"

	file, header, err := r.FormFile("image")
	if err == nil {
		defer file.Close()

		filePath := "static/uploads/" + header.Filename
		dst, _ := os.Create(filePath)
		defer dst.Close()
		io.Copy(dst, file)
		fmt.Printf("Resim kaydedildi: %s\n", filePath)
	}

	fmt.Printf("Yeni Banner: Link: %s, Yer: %s, Desktop: %v\n", link, location, isDesktop)

	w.Header().Set("HX-Trigger", "banners-updated")
	w.WriteHeader(http.StatusOK)
	w.Write([]byte("Uğurla yadda saxlanıldı!"))
}
