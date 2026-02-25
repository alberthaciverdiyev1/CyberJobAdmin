package model

const (
	IconDashboard = "fa-solid fa-gauge-high"
	IconBanner    = "fa-solid fa-images"
	IconElan      = "fa-solid fa-bullhorn"
	IconFilter    = "fa-solid fa-filter"
	IconPremium   = "fa-solid fa-star"
	IconCompany   = "fa-solid fa-building"
	IconService   = "fa-solid fa-gears"
	IconAbout     = "fa-solid fa-circle-info"
	IconBlog      = "fa-solid fa-newspaper"
)

type MenuItem struct {
	Label  string
	Path   string
	Icon   string
	Active bool
}
