@extends('layouts.layout')

@section('content')
<!-- Hero Section -->
<div class="relative h-screen">
    <div class="absolute inset-0 bg-[var(--primary-color)] opacity-40"></div>
    <div class="absolute inset-0 flex items-center justify-center text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-7xl font-bold text-[var(--text-light)] mb-8 tracking-tight">讓每個瞬間都成為永恆</h1>
            <p class="text-xl md:text-3xl text-[var(--text-light)] mb-10 leading-relaxed">專業溫暖的心理諮商服務，陪伴您探索內在、找回平靜</p>
            <a href="#" class="inline-block bg-[var(--background-color)] text-[var(--primary-color)] px-10 py-4 rounded-full text-lg font-semibold hover:bg-[var(--text-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">預約諮詢</a>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">專業服務項目</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">我們提供全方位的心理諮商服務，讓您在安全的環境中，獲得專業的心理支持與陪伴</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="bg-[var(--text-light)] p-10 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">💒</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">個人諮商</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">針對個人情緒、人際關係、生涯規劃等議題，提供專業的心理諮商服務</p>
            </div>
            
            <div class="bg-[var(--text-light)] p-10 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">📸</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">伴侶諮商</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">協助伴侶探索關係議題，增進溝通理解，建立更健康的互動模式</p>
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
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">聽聽他們的心路歷程分享</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-[var(--primary-light)] mb-8 text-lg leading-relaxed italic">「感謝好家在心理諮商所的專業團隊，在我最低潮的時候給予支持與陪伴，讓我重新找到面對生活的力量。」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-xl font-semibold text-[var(--primary-color)]">王小姐</h4>
                        <p class="text-[var(--primary-light)]">台北市 / 個人成長歷程</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-[var(--primary-light)] mb-8 text-lg leading-relaxed italic">「婚禮籌備過程中的每個細節都被完美掌握，讓我們能夠真正享受這個重要時刻，賓客的回饋也都非常正面！」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-xl font-semibold text-[var(--primary-color)]">李先生</h4>
                        <p class="text-[var(--primary-light)]">新北市 / 人際關係成長</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <p class="text-[var(--primary-light)] mb-8 text-lg leading-relaxed italic">「在這裡的伴侶諮商幫助我們找到更好的溝通方式，現在我們的關係比以前更加親密和理解。」</p>
                <div class="flex items-center">
                    <div class="ml-3">
                        <h4 class="text-xl font-semibold text-[var(--primary-color)]">張小姐</h4>
                        <p class="text-[var(--primary-light)]">桃園市 / 伴侶關係提升</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection