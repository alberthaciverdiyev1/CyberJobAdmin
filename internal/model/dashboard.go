package model

type DashboardStats struct {
	TotalJobCount     int
	TotalCompanyCount int
	PremiumJobCount   int
	BannerCount       int
}

type CompanySummary struct {
	ID              int
	Name            string
	Date            string
	JobCount        int
	PremiumJobCount int
}
