<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberJob - İdarəetmə Paneli</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center gradient-bg">
    <div class="text-center px-6 py-12">
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-12 shadow-2xl border border-white/20 max-w-lg mx-auto">
            <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-4">CyberJob</h1>
            <p class="text-blue-100 text-lg mb-8">İş elanları platformasının idarəetmə panelinə xoş gəlmisiniz</p>
            <div class="space-y-3">
                <a href="/admin" class="inline-block w-full px-6 py-3 bg-white text-blue-600 font-semibold rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-lg hover:shadow-xl">
                    İdarəetmə Panelinə Daxil Ol
                </a>
                <p class="text-blue-200 text-sm mt-4">
                    Vakansiyaları, şirkətləri və sayt məzmununu idarə edin
                </p>
            </div>
        </div>
        <p class="text-blue-200/60 text-sm mt-8">
            &copy; {{ date('Y') }} CyberJob. Bütün hüquqlar qorunur.
        </p>
    </div>
</body>
</html>
