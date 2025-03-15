<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>好家在心理諮商所</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100 fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-gray-800">好家在心理諮商所</a>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#about" class="text-gray-600 hover:text-gray-900">諮商所介紹</a>
                        <a href="#services" class="text-gray-600 hover:text-gray-900">服務項目</a>
                        <a href="#counselors" class="text-gray-600 hover:text-gray-900">諮商師介紹</a>
                        <a href="#environment" class="text-gray-600 hover:text-gray-900">環境空間</a>
                        <a href="#appointment" class="text-gray-600 hover:text-gray-900">預約諮商</a>
                    </div>
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="mobile-menu" class="hidden md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="#about" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商所介紹</a>
                        <a href="#services" class="block px-3 py-2 text-gray-600 hover:text-gray-900">服務項目</a>
                        <a href="#counselors" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商師介紹</a>
                        <a href="#environment" class="block px-3 py-2 text-gray-600 hover:text-gray-900">環境空間</a>
                        <a href="#appointment" class="block px-3 py-2 text-gray-600 hover:text-gray-900">預約諮商</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-gray-800 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">好家在心理諮商所</h3>
                        <p class="text-gray-400">專業溫暖的心理諮商服務</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">快速連結</h4>
                        <ul class="space-y-2">
                            <li><a href="#about" class="text-gray-400 hover:text-white">諮商所介紹</a></li>
                            <li><a href="#services" class="text-gray-400 hover:text-white">服務項目</a></li>
                            <li><a href="#counselors" class="text-gray-400 hover:text-white">諮商師介紹</a></li>
                            <li><a href="#environment" class="text-gray-400 hover:text-white">環境空間</a></li>
                            <li><a href="#appointment" class="text-gray-400 hover:text-white">預約諮商</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">聯絡資訊</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>電話：(02) 1234-5678</li>
                            <li>信箱：info@holduandme.com</li>
                            <li>地址：台北市信義區信義路五段</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">追蹤我們</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white">FB</a>
                            <a href="#" class="text-gray-400 hover:text-white">IG</a>
                            <a href="#" class="text-gray-400 hover:text-white">Line</a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                    © {{ date('Y') }} 好家在心理諮商所. All rights reserved.
                </div>
            </div>
        </footer>

        <script>
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        </script>
    </div>
</body>
</html>
