package utils

import (
	"bytes"
	"encoding/json"
	"fmt"
	"log"
	"net/http"
	"os"
	"path/filepath"
	"time"
)

const (
	BaseURL = "http://localhost:8080"
	LogDir  = "logs"
	LogFile = "api_errors.log"
)

type APIResponse[T any] struct {
	Success bool   `json:"success"`
	Message string `json:"message"`
	Data    T      `json:"data"`
}

type Client struct {
	BaseURL string
	Token   string
	HTTP    *http.Client
}

func NewClient() *Client {
	return &Client{
		BaseURL: BaseURL,
		HTTP:    &http.Client{Timeout: 10 * time.Second},
	}
}

// writeErrorToLog xətaları logs/api_errors.log faylına qeyd edir
func writeErrorToLog(errMsg string) {
	// 1. Logs qovluğunun mövcudluğunu yoxla və yoxdursa yarat
	if _, err := os.Stat(LogDir); os.IsNotExist(err) {
		if err := os.MkdirAll(LogDir, 0755); err != nil {
			log.Printf("Log qovluğu yaradıla bilmədi: %v", err)
			return
		}
	}

	// 2. Fayl yolunu tam formalaşdır
	logPath := filepath.Join(LogDir, LogFile)

	// 3. Faylı aç (O_APPEND - sonuna əlavə et, O_CREATE - yoxdursa yarat)
	f, err := os.OpenFile(logPath, os.O_APPEND|os.O_CREATE|os.O_WRONLY, 0644)
	if err != nil {
		log.Printf("Log faylı açıla bilmədi: %v", err)
		return
	}
	defer f.Close()

	// 4. Zaman damğası ilə xətanı formatla və yaz
	timestamp := time.Now().Format("2006-01-02 15:04:05")
	logLine := fmt.Sprintf("[%s] ERROR: %s\n", timestamp, errMsg)

	if _, err := f.WriteString(logLine); err != nil {
		log.Printf("Fayla yazıla bilmədi: %v", err)
	}
}

func Fetch[T any](c *Client, method, endpoint string, bodyData interface{}) (T, error) {
	var result T
	var bodyReader *bytes.Buffer

	if bodyData != nil {
		jsonData, err := json.Marshal(bodyData)
		if err != nil {
			errStr := fmt.Sprintf("JSON marshal xətası: %v", err)
			writeErrorToLog(errStr)
			return result, fmt.Errorf(errStr)
		}
		bodyReader = bytes.NewBuffer(jsonData)
	} else {
		bodyReader = bytes.NewBuffer([]byte{})
	}

	fullURL := c.BaseURL + endpoint
	req, err := http.NewRequest(method, fullURL, bodyReader)
	if err != nil {
		errStr := fmt.Sprintf("Request yaradıla bilmədi: %v", err)
		writeErrorToLog(errStr)
		return result, fmt.Errorf(errStr)
	}

	req.Header.Set("Content-Type", "application/json")
	if c.Token != "" {
		req.Header.Set("Authorization", "Bearer "+c.Token)
	}

	resp, err := c.HTTP.Do(req)
	if err != nil {
		errStr := fmt.Sprintf("API bağlantı xətası (%s %s): %v", method, endpoint, err)
		writeErrorToLog(errStr)
		return result, err
	}
	defer resp.Body.Close()

	if resp.StatusCode >= 400 {
		errStr := fmt.Sprintf("Server xətası: %s %s -> status %d", method, endpoint, resp.StatusCode)
		writeErrorToLog(errStr)
		return result, fmt.Errorf(errStr)
	}

	var apiRes APIResponse[T]
	if err := json.NewDecoder(resp.Body).Decode(&apiRes); err != nil {
		errStr := fmt.Sprintf("Decode xətası (%s %s): %v", method, endpoint, err)
		writeErrorToLog(errStr)
		return result, fmt.Errorf(errStr)
	}

	return apiRes.Data, nil
}

func Get[T any](c *Client, endpoint string) (T, error) {
	return Fetch[T](c, "GET", endpoint, nil)
}

func Post[T any](c *Client, endpoint string, data interface{}) (T, error) {
	return Fetch[T](c, "POST", endpoint, data)
}

func Put[T any](c *Client, endpoint string, data interface{}) (T, error) {
	return Fetch[T](c, "PUT", endpoint, data)
}

func Delete[T any](c *Client, endpoint string) (T, error) {
	return Fetch[T](c, "DELETE", endpoint, nil)
}
