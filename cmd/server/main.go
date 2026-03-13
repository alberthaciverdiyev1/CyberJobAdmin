package main

import (
	"fmt"
	"net/http"

	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/handler"
	"github.com/alberthaciverdiyev1/CyberJobAdmin/internal/routes"
)

func main() {
	homeHdl := handler.HomeHandler{}
	bannerHdl := handler.NewBannerHandler()
	blogHdl := handler.NewBlogHandler()
	categoryHdl := handler.NewCategoryHandler()

	companyHdl := handler.CompanyHandler{}
	filterHdl := handler.FilterHandler{}

	router := routes.NewRouter(homeHdl, *bannerHdl, companyHdl, filterHdl, *blogHdl, *categoryHdl)

	fmt.Println("Server running on http://localhost:8081 ")
	err := http.ListenAndServe(":8081", router)
	if err != nil {
		fmt.Println(err)
	}
}
