MAIN_PATH = cmd/server/main.go
BINARY_NAME = cyberjob-admin

all: build

templ:
	@echo "🎨 Templ dosyaları üretiliyor..."
	@templ generate

build: templ
	@echo "🏗️  Proje derleniyor..."
	@go build -o bin/$(BINARY_NAME) $(MAIN_PATH)

run: templ
	@echo "🚀 Sunucu başlatılıyor..."
	@go run $(MAIN_PATH)

tidy:
	@echo "🧹 Modüller temizleniyor..."
	@go mod tidy

clean:
	@echo "🗑️  Temizlik yapılıyor..."
	@rm -rf bin/
	@rm -rf view/**/*_templ.go

watch:
	@echo "👀 İzleme modu başlatıldı (Air)..."
	@air