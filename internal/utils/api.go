package utils

import (
	"encoding/json"
	"net/http"
)

type APIResponse[T any] struct {
	Success bool   `json:"success"`
	Message string `json:"message"`
	Data    T      `json:"data"`
}

func FetchAPI[T any](url string) (T, error) {
	var result T

	resp, err := http.Get(url)
	if err != nil {
		return result, err
	}
	defer resp.Body.Close()

	var apiRes APIResponse[T]
	if err := json.NewDecoder(resp.Body).Decode(&apiRes); err != nil {
		return result, err
	}

	return apiRes.Data, nil
}
