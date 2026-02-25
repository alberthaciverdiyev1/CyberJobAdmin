package model

import "time"

type Company struct {
	ID        int
	Name      string
	CreatedAt time.Time
	TotalAds  int
	ActiveAds int
	IsVisible bool
}
