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
                    <div class="flex items-center gap-2">
                        <a href="/" class="div_brand_logo flex flex-col">
                            <span class="text-2xl font-bold text-[#8BA89E]">好家在心理諮商所</span>
                            <span class="text-sm text-gray-500">hó-ka-tsài counseling center</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#news" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#D67A7A] hover:border-[#D67A7A]">最新消息</a>

                        <div class="relative group">
                            <a href="#team" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#D69B7A] hover:border-[#D69B7A] inline-flex items-center">關於我們
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </a>
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <a href="#team" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">團隊介紹</a>
                                <a href="#space" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">諮商空間</a>
                            </div>
                        </div>

                        <div class="relative group">
                            <a href="#counseling-services" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#D6B77A] hover:border-[#D6B77A] inline-flex items-center">諮商服務
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </a>
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <a href="#counseling-services" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">各項諮商服務</a>
                                <a href="#cooperation" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">合作專案</a>
                                <a href="#agreement" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">同意書</a>
                            </div>
                        </div>

                        <a href="#appointment" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#7AD68E] hover:border-[#7AD68E]">諮商預約</a>
                        <a href="#courses" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#7AA6D6] hover:border-[#7AA6D6]">講座課程</a>
                        <a href="#column" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#A67AD6] hover:border-[#A67AD6]">諮商專欄</a>
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
                        <a href="#news" class="block px-3 py-2 text-gray-600 hover:text-gray-900">最新消息</a>

                        <div class="relative">
                            <button onclick="toggleSubmenu('about-submenu')" class="w-full flex justify-between items-center px-3 py-2 text-gray-600 hover:text-gray-900">
                                關於我們
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="about-submenu" class="hidden pl-4">
                                <a href="#team" class="block px-3 py-2 text-gray-600 hover:text-gray-900">團隊介紹</a>
                                <a href="#space" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商空間</a>
                            </div>
                        </div>

                        <div class="relative">
                            <button onclick="toggleSubmenu('services-submenu')" class="w-full flex justify-between items-center px-3 py-2 text-gray-600 hover:text-gray-900">
                                諮商服務
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="services-submenu" class="hidden pl-4">
                                <a href="#counseling-services" class="block px-3 py-2 text-gray-600 hover:text-gray-900">各項諮商服務</a>
                                <a href="#cooperation" class="block px-3 py-2 text-gray-600 hover:text-gray-900">合作專案</a>
                                <a href="#agreement" class="block px-3 py-2 text-gray-600 hover:text-gray-900">同意書</a>
                            </div>
                        </div>

                        <a href="#appointment" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商預約</a>
                        <a href="#courses" class="block px-3 py-2 text-gray-600 hover:text-gray-900">講座課程</a>
                        <a href="#column" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商專欄</a>
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

            function toggleSubmenu(id) {
                document.getElementById(id).classList.toggle('hidden');
            }

            // 為移動端選單中的所有連結添加點擊事件
            document.querySelectorAll('#mobile-menu a').forEach(function(link) {
                link.addEventListener('click', function() {
                    document.getElementById('mobile-menu').classList.add('hidden');
                });
            });
        </script>
    </div>
</body>
</html>
