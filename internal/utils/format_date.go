package utils

import (
	"log"
	"time"
)

func ParseDate(dateStr string) time.Time {
	layout := "02.01.2006"
	t, err := time.Parse(layout, dateStr)

	if err != nil {
		log.Printf("Tarih ayrıştırma hatası (%s): %v", dateStr, err)
		return time.Time{}
	}

	return t
}

func ParseDateSafe(dateStr string) (time.Time, error) {
	return time.Parse("02.01.2006", dateStr)
}
