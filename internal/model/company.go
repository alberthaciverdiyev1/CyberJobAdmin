package model

import "time"

type Company struct {
	ID         int
	Name       string
	Category   string
	Email      string
	Phone      string
	Address    string
	About      string
	CreatedAt  time.Time
	TotalAds   int
	ActiveAds  int
	IsVerified bool
	IsVisible  bool
}
