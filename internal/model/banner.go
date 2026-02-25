package model

import "time"

type Banner struct {
	ID        int       `json:"id"`
	Image     string    `json:"image"`
	Location  string    `json:"location"`
	Link      string    `json:"link"`
	StartAt   time.Time `json:"start_at"`
	EndAt     time.Time `json:"end_at"`
	IsActive  bool      `json:"is_active"`
	IsDesktop bool      `json:"is_desktop"`
	CreatedAt time.Time `json:"created_at"`
}
