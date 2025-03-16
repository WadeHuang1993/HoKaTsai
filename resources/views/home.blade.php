@extends('layouts.layout')

@section('content')
<!-- about Section - 諮商所介紹 -->
<div id="about" class="relative min-h-screen bg-[var(--background-color)]">
    <div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">
        <!-- 左側環境照片 -->
        <div class="relative h-128 md:h-full">
            <img src="/images/environment/waiting_room.jpg" alt="等候室環境" class="w-full h-full object-cover">
        </div>
        
        <!-- 右側文字內容 -->
        <div class="relative" style="background-image: url('/images/environment/wood_card.png'); background-size: cover; background-position: center;">
            <div class="relative z-10 p-8 md:p-12 flex flex-col justify-center h-full">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[var(--text-light)] mb-6 md:mb-8 tracking-tight">好家在心理諮商所</h1>
                <p class="text-lg md:text-xl lg:text-2xl text-[var(--text-light)] mb-4 md:mb-6 leading-relaxed">專業溫暖的心理諮商服務，陪伴您探索內在、找回平靜</p>
                <p class="text-base md:text-lg text-[var(--text-light)] mb-8 md:mb-10 leading-relaxed">我們致力於提供安全、專業的心理諮商環境，協助您面對生活中的各種挑戰，重拾內在力量與平衡。</p>
                <a href="/appointment" class="inline-block bg-[var(--background-color)] text-[var(--primary-color)] px-8 md:px-10 py-3 md:py-4 rounded-full text-lg font-semibold hover:bg-[var(--text-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">預約諮商</a>
            </div>
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div id="services" class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">專業服務項目</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">我們提供全方位的心理諮商服務，讓您在安全的環境中，獲得專業的心理支持與陪伴</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-[var(--text-light)] p-8 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">👤</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">個人諮商</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">針對個人情緒、人際關係、生涯規劃等議題，提供專業的心理諮商服務</p>
            </div>

            <div class="bg-[var(--text-light)] p-8 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">👥</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">伴侶諮商</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">協助伴侶探索關係議題，增進溝通理解，建立更健康的互動模式</p>
            </div>

            <div class="bg-[var(--text-light)] p-8 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">👨‍👩‍👧‍👦</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">家族諮商</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">處理家庭關係議題，促進家庭成員間的理解與溝通，建立和諧家庭氛圍</p>
            </div>

            <div class="bg-[var(--text-light)] p-8 rounded-xl text-center hover:shadow-xl transition duration-300 border border-[var(--background-color)]">
                <div class="text-5xl text-[var(--primary-color)] mb-6">🎯</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">工作坊課程</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">提供多元化的成長課程，幫助您探索自我、提升人際關係與生活品質</p>
            </div>
        </div>
    </div>
</div>

<!-- Counselors Section -->
<div id="counselors" class="py-24 bg-[var(--text-light)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">專業諮商師團隊</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">擁有豐富經驗的諮商師團隊，為您提供專業且溫暖的心理支持</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <div class="bg-[var(--background-color)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/teams/S__91521028.webp" alt="諮商師照片" class="w-48 h-64 rounded-xl mx-auto mb-6 object-cover">
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-3 text-center">王曉明 諮商師</h3>
                <p class="text-[var(--primary-light)] mb-4 text-center">臨床心理師 / 諮商心理師</p>
                <p class="text-[var(--primary-light)] leading-relaxed">專長領域：情緒管理、人際關係、伴侶諮商、憂鬱症、焦慮症</p>
            </div>

            <div class="bg-[var(--background-color)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/teams/S__91521028.webp" alt="諮商師照片" class="w-48 h-64 rounded-xl mx-auto mb-6 object-cover">
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-3 text-center">李美玲 諮商師</h3>
                <p class="text-[var(--primary-light)] mb-4 text-center">諮商心理師</p>
                <p class="text-[var(--primary-light)] leading-relaxed">專長領域：家族治療、親子關係、婚姻諮商、創傷治療</p>
            </div>
        </div>
    </div>
</div>

<!-- Environment Photos Section -->
<div id="environment" class="bg-[var(--background-color)] py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">環境空間</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">溫馨舒適的諮商環境，為您提供安心放鬆的空間</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="relative h-64 overflow-hidden rounded-xl">
                <img src="/images/environment/1.jpg" alt="諮商空間" class="w-full h-full object-cover hover:scale-105 transition duration-300">
            </div>
            <div class="relative h-64 overflow-hidden rounded-xl">
                <img src="/images/environment/2.jpg" alt="休息區" class="w-full h-full object-cover hover:scale-105 transition duration-300">
            </div>
            <div class="relative h-64 overflow-hidden rounded-xl">
                <img src="/images/environment/3.jpg" alt="等候區" class="w-full h-full object-cover hover:scale-105 transition duration-300">
            </div>
            <div class="relative h-64 overflow-hidden rounded-xl">
                <img src="/images/environment/4.jpg" alt="團體諮商室" class="w-full h-full object-cover hover:scale-105 transition duration-300">
            </div>
        </div>
    </div>
</div>

<!-- appointment Section -->
<div id="appointment" class="bg-[var(--primary-color)] py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-[var(--text-light)] mb-8">準備好開始您的心理諮商之旅了嗎？</h2>
        <p class="text-xl text-[var(--text-light)] mb-12 leading-relaxed">讓我們一起探索、成長，找回內在的平靜與力量</p>
        <a href="/appointment" class="inline-block bg-[var(--text-light)] text-[var(--primary-color)] px-12 py-5 rounded-full text-xl font-semibold hover:bg-[var(--background-color)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">立即預約諮商</a>
    </div>
</div>
@endsection
