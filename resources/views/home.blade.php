@extends('layouts.layout')

@section('content')
<!-- Hero Section -->
<div class="relative h-screen">
    <div class="absolute inset-0 bg-[var(--primary-color)] opacity-40"></div>
    <div class="absolute inset-0 flex items-center justify-center text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-7xl font-bold text-[var(--text-light)] mb-8 tracking-tight">讓每個瞬間都成為永恆</h1>
            <p class="text-xl md:text-3xl text-[var(--text-light)] mb-10 leading-relaxed">用心打造獨一無二的婚禮，為您留下最動人的回憶</p>
            <a href="#" class="inline-block bg-[var(--background-color)] text-[var(--primary-color)] px-10 py-4 rounded-full text-lg font-semibold hover:bg-[var(--text-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">預約諮詢</a>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">專業服務項目</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">我們提供一站式婚禮服務，從策劃到執行，讓您安心享受這人生最重要的時刻</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="bg-[var(--text-light)] p-10 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">💒</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">婚禮策劃</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">專業團隊為您量身打造完美婚禮，從場地挑選到流程安排，細節面面俱到</p>
            </div>
            
            <div class="bg-[var(--text-light)] p-10 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">📸</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">婚紗攝影</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">資深攝影團隊，以專業視角捕捉每個感動瞬間，為您留下最美好的回憶</p>
            </div>
            
            <div class="bg-[var(--text-light)] p-10 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">🎨</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">婚禮佈置</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">創意設計團隊，依據您的喜好打造獨特風格的婚禮場景，讓現場更加精緻動人</p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">幸福新人推薦</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">聽聽他們分享的婚禮故事</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-[var(--primary-light)] mb-8 text-lg leading-relaxed italic">「感謝 Hold U and Me 的專業團隊，從初次諮詢到婚禮當天都給予我們最貼心的服務，讓我們擁有一場難忘的婚禮！」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-xl font-semibold text-[var(--primary-color)]">王小姐</h4>
                        <p class="text-[var(--primary-light)]">台北市 / 2023年度婚禮</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-[var(--primary-light)] mb-8 text-lg leading-relaxed italic">「婚禮籌備過程中的每個細節都被完美掌握，讓我們能夠真正享受這個重要時刻，賓客的回饋也都非常正面！」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-xl font-semibold text-[var(--primary-color)]">李先生</h4>
                        <p class="text-[var(--primary-light)]">新北市 / 2023年度婚禮</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-[var(--primary-light)] mb-8 text-lg leading-relaxed italic">「婚禮現場的佈置超乎預期的美，攝影團隊也非常專業，捕捉到許多感動的畫面，讓我們的婚禮充滿了美好回憶。」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-xl font-semibold text-[var(--primary-color)]">張小姐</h4>
                        <p class="text-[var(--primary-light)]">桃園市 / 2023年度婚禮</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection