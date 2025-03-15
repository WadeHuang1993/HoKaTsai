@extends('layouts.layout')

@section('content')
<!-- Hero Section -->
<div class="relative h-screen">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">打造您的完美婚禮</h1>
            <p class="text-xl md:text-2xl text-white mb-8">專業的婚禮顧問團隊，為您實現夢想中的婚禮</p>
            <a href="#" class="inline-block bg-white text-gray-900 px-8 py-3 rounded-full text-lg font-semibold hover:bg-gray-100 transition duration-300">立即諮詢</a>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">我們的服務</h2>
            <p class="text-xl text-gray-600">提供全方位的婚禮服務，讓您安心享受這個重要時刻</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">💒</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">婚禮策劃</h3>
                <p class="text-gray-600">量身打造完美婚禮，從場地選擇到細節安排，一應俱全</p>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">📸</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">婚紗攝影</h3>
                <p class="text-gray-600">專業攝影團隊，捕捉每個動人時刻</p>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition duration-300">
                <div class="text-4xl text-gray-800 mb-4">🎨</div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">婚禮佈置</h3>
                <p class="text-gray-600">創意設計團隊，打造獨特婚禮場景</p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">新人見證</h2>
            <p class="text-xl text-gray-600">聽聽他們的故事</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-6">「非常感謝 Hold U and Me 的團隊，讓我們的婚禮完美呈現，賓客都讚不絕口！」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-lg font-semibold text-gray-900">王小姐</h4>
                        <p class="text-gray-500">台北市</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-6">「專業的服務態度，細心的安排，讓我們完全不用擔心婚禮的細節。」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-lg font-semibold text-gray-900">李先生</h4>
                        <p class="text-gray-500">新北市</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <p class="text-gray-600 mb-6">「婚禮佈置超出預期，攝影團隊也非常專業，留下了許多美好的回憶。」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-lg font-semibold text-gray-900">張小姐</h4>
                        <p class="text-gray-500">桃園市</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection