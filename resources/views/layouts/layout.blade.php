<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="icon" href="/images/favicon.jpg" sizes="32x32">--}}
    <link rel="icon" href="/images/favicon-2.png" sizes="32x32">

    @if(isset($seoData))
        <title>{{ $seoData['title'] }}</title>
        <meta name="description" content="{{ $seoData['description'] }}">
        <meta name="keywords" content="{{ $seoData['keywords'] }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="{{ $seoData['og']['type'] }}">
        <meta property="og:url" content="{{ $seoData['og']['url'] }}">
        <meta property="og:title" content="{{ $seoData['og']['title'] }}">
        <meta property="og:description" content="{{ $seoData['og']['description'] }}">
        <meta property="og:image" content="{{ $seoData['og']['image'] }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="{{ $seoData['twitter']['card'] }}">
        <meta name="twitter:title" content="{{ $seoData['twitter']['title'] }}">
        <meta name="twitter:description" content="{{ $seoData['twitter']['description'] }}">
        <meta name="twitter:image" content="{{ $seoData['twitter']['image'] }}">

        <!-- Schema.org markup -->
        <script type="application/ld+json">
            {!! json_encode($seoData['schema']) !!}
        </script>
    @else
        <title>好家在心理諮商所</title>
    @endif

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/colors.css') }}?version=1" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}?version=1" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?version=1" defer></script>

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
                        <a href="{{ route('home') }}" class="div_brand_logo flex flex-col">
                            <span class="text-2xl font-bold text-[#8BA89E]">好家在心理諮商所</span>
                            <span class="text-sm text-gray-500">hó-ka-tsài counseling center</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="{{ route('home') }}#news" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#D67A7A] hover:border-[#D67A7A]">最新消息</a>

                        <div class="relative group">
                            <a href="{{ route('home') }}#team" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#D69B7A] hover:border-[#D69B7A] inline-flex items-center">關於我們
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </a>
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <a href="{{ route('home') }}#team" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 border-b border-gray-200">團隊介紹</a>
                                <a href="{{ route('home') }}#space" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">諮商空間</a>
                            </div>
                        </div>

                        <div class="relative group">
                            <a href="{{ route('home') }}#counseling-services" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#D6B77A] hover:border-[#D6B77A] inline-flex items-center">諮商服務
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </a>
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <a href="{{ route('home') }}#counseling-services" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 border-b border-gray-200">各項諮商服務</a>
                                <a href="{{ route('home') }}#partner" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 border-b border-gray-200">合作單位與合作方案</a>
                                <a href="{{ route('faq.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 border-b border-gray-200">諮商Q&A</a>
                                <a href="{{ route('service-fee.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">諮商費用</a>
                            </div>
                        </div>

                        <a href="{{ route('home') }}#appointment" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#7AD68E] hover:border-[#7AD68E]">諮商預約</a>
                        <a href="{{ route('courses.index') }}" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#7AA6D6] hover:border-[#7AA6D6]">講座課程</a>
                        <a href="{{ route('home') }}#column" class="text-gray-600 hover:text-gray-900 pb-1 border-b-2 border-[#A67AD6] hover:border-[#A67AD6]">諮商專欄</a>
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
                        <a href="{{ route('home') }}#news" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-[#D67A7A]" style="border-bottom-style: dotted;">最新消息</a>

                        <div class="relative">
                            <button onclick="toggleSubmenu('about-submenu')" class="w-full flex justify-between items-center px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-[#D69B7A]" style="border-bottom-style: dotted;">
                                關於我們
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="about-submenu" class="hidden pl-4">
                                <a href="{{ route('home') }}#team" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-gray-200">團隊介紹</a>
                                <a href="{{ route('home') }}#space" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商空間</a>
                            </div>
                        </div>

                        <div class="relative">
                            <button onclick="toggleSubmenu('services-submenu')" class="w-full flex justify-between items-center px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-[#D6B77A]" style="border-bottom-style: dotted;">
                                諮商服務
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div id="services-submenu" class="hidden pl-4">
                                <a href="{{ route('home') }}#counseling-services" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-gray-200">各項諮商服務</a>
                                <a href="{{ route('home') }}#partner" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-gray-200">合作單位與合作方案</a>
                                <a href="{{ route('faq.index') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-gray-200">諮商Q&A</a>
                                <a href="{{ route('service-fee.index') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-900">諮商費用</a>
                            </div>
                        </div>

                        <a href="{{ route('home') }}#appointment" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-[#7AD68E]" style="border-bottom-style: dotted;">諮商預約</a>
                        <a href="{{ route('courses.index') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-[#7AA6D6]" style="border-bottom-style: dotted;">講座課程</a>
                        <a href="{{ route('home') }}#column" class="block px-3 py-2 text-gray-600 hover:text-gray-900 border-b border-[#A67AD6]" style="border-bottom-style: dotted;">諮商專欄</a>
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
                            <li>電話：(06)223-8050</li>
                            <li>信箱：<a href="mailto:hokatsaicounseling@gmail.com">hokatsaicounseling@gmail.com</a></li>
                            <li>地址：700台南市中西區友愛街237號</li>
                        </ul>
                    </div>
                    <div class="follow-us">
                        <h4 class="text-lg font-semibold mb-4">追蹤我們</h4>
                        <div class="flex space-x-8">
                            <a href="https://www.instagram.com/hokatsaicounseling?igsh=aGRqcmEzajF3cno5" class="flex flex-col items-center text-gray-400 hover:text-white" target="_blank" aria-label="Instagram">
                                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram" class="w-10 h-10 mb-1 rounded-full" style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); padding: 2px;">
                                <span class="text-xs mt-1">Instagram</span>
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=61573891754810&mibextid=wwXIfr&rdid=wuFXNwbetD8493p4&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1AXpSvB7M2%2F%3Fmibextid%3DwwXIfr#" class="flex flex-col items-center text-gray-400 hover:text-white" target="_blank" aria-label="Facebook">
                                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" class="w-10 h-10 mb-1 rounded-full" style="background: #1877f3; padding: 2px;">
                                <span class="text-xs mt-1">Facebook</span>
                            </a>
                            <a href="https://lin.ee/2VKNxkK" class="flex flex-col items-center text-gray-400 hover:text-white" target="_blank" aria-label="Line">
                                <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/line.svg" alt="Line" class="w-10 h-10 mb-1 rounded-full" style="background: #06c755; padding: 2px;">
                                <span class="text-xs mt-1">Line</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                    © {{ date('Y') }} 好家在心理諮商所. All rights reserved.
                </div>
            </div>
        </footer>

        <!-- Line 浮球 -->
        <a href="https://lin.ee/2VKNxkK" target="_blank" class="fixed bottom-32 right-6 z-50 flex items-center px-4 py-2 bg-[#06c755] text-white rounded-full shadow-lg hover:bg-[#05b14b] transition-all group" style="min-width: 120px;">
            <svg class="w-7 h-7 mr-2" viewBox="0 0 48 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="24" fill="#06c755"/>
                <path d="M24 12C16.268 12 10 17.477 10 24.08c0 3.13 1.915 5.89 4.91 7.74-.21.77-.77 2.77-.88 3.19 0 0-.02.07 0 .15.04.14.16.19.27.19.09 0 .18-.03.18-.03.23-.03 2.53-1.67 3.56-2.38 1.37.2 2.8.32 4.28.32 7.732 0 14-5.477 14-12.08S31.732 12 24 12z" fill="#fff"/>
            </svg>
            <span class="font-bold text-base group-hover:underline">立即預約</span>
        </a>
        <!-- /Line 浮球 -->

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
