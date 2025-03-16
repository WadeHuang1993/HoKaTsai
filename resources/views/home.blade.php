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
        <div class="relative" style="background-image: url('/images/others/wood_card.png'); background-size: cover; background-position: center;">
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

<!-- News Section - 最新消息 -->
<div id="news" class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">最新消息</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">了解我們的最新動態與活動資訊</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- 最新消息項目 1 -->
            <div class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/environment/1.jpg" alt="最新消息1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">2024-01-15</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">新年度諮商優惠方案開跑</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">為迎接新的一年，本所推出多項優惠方案，希望能幫助更多需要心理支持的朋友。</p>
                    <a href="/news/1" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                </div>
            </div>

            <!-- 最新消息項目 2-6 -->
            <div class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/environment/2.jpg" alt="最新消息2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">2024-01-10</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">心理健康講座系列活動</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">每月固定舉辦的心理健康講座，邀請您一同探索心靈成長之路。</p>
                    <a href="/news/2" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                </div>
            </div>

            <!-- 重複類似結構到第6個 -->
        </div>
    </div>
</div>

<!-- About Us Section - 團隊介紹 -->
<div id="team" class="py-24 bg-[var(--text-light)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- 團隊介紹 -->
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">團隊介紹</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">專業且經驗豐富的諮商團隊，為您提供最適切的心理支持</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-24">
            <!-- 團隊成員 1 -->
            <div class="bg-[var(--background-color)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/teams/S__91521028.webp" alt="王曉明諮商師" class="w-48 h-64 rounded-xl mx-auto mb-6 object-cover">
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-3 text-center">王曉明</h3>
                <p class="text-[var(--primary-light)] mb-4 text-center">資深諮商心理師</p>
                <p class="text-[var(--primary-light)] leading-relaxed">專長領域：情緒管理、人際關係、伴侶諮商、憂鬱症、焦慮症</p>
            </div>

            <!-- 團隊成員 2 -->
            <div class="bg-[var(--background-color)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/teams/S__91521028.webp" alt="王曉明諮商師" class="w-48 h-64 rounded-xl mx-auto mb-6 object-cover">
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-3 text-center">李美玲</h3>
                <p class="text-[var(--primary-light)] mb-4 text-center">諮商心理師</p>
                <p class="text-[var(--primary-light)] leading-relaxed">專長領域：家族治療、親子關係、婚姻諮商、創傷治療</p>
            </div>
        </div>

        <!-- 諮商空間 -->
        <div id="space" class="text-center mb-20 scroll-mt-24">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">諮商空間</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">溫馨舒適的環境，讓您安心放鬆</p>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-4 md:col-span-1">
                <img src="/images/environment/1.jpg" alt="諮商空間1" class="w-full h-64 object-cover rounded-xl hover:scale-105 transition duration-300">
            </div>
            <div class="col-span-4 md:col-span-1">
                <img src="/images/environment/2.jpg" alt="諮商空間2" class="w-full h-64 object-cover rounded-xl hover:scale-105 transition duration-300">
            </div>
            <div class="col-span-4 md:col-span-1">
                <img src="/images/environment/3.jpg" alt="諮商空間3" class="w-full h-64 object-cover rounded-xl hover:scale-105 transition duration-300">
            </div>
            <div class="col-span-4 md:col-span-1">
                <img src="/images/environment/4.jpg" alt="諮商空間4" class="w-full h-64 object-cover rounded-xl hover:scale-105 transition duration-300">
            </div>
        </div>
    </div>
</div>

<!-- Services Section - 諮商服務 -->
<div id="counseling-services" class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">各項諮商服務</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">提供多元化的心理諮商服務，滿足不同需求</p>
        </div>

        <!-- 各項諮商服務 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <div class="bg-[var(--text-light)] p-8 rounded-xl text-center hover:shadow-xl transition duration-300">
                <div class="text-5xl text-[var(--primary-color)] mb-6">👤</div>
                <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">個人諮商</h3>
                <p class="text-[var(--primary-light)] leading-relaxed">針對個人情緒、人際關係、生涯規劃等議題提供協助</p>
            </div>
            <!-- 其他服務項目 -->
        </div>

        <!-- 合作專案 -->
        <div id="cooperation" class="bg-[var(--text-light)] p-8 rounded-xl mb-20 scroll-mt-24">
            <h3 class="text-3xl font-bold text-[var(--primary-color)] mb-6 text-center">合作專案</h3>
            <p class="text-[var(--primary-light)] text-center mb-8">我們與多個機構合作，提供專業的心理健康服務</p>
            <!-- 合作項目列表 -->
        </div>

        <!-- 同意書 -->
        <div id="agreement" class="bg-[var(--text-light)] p-8 rounded-xl scroll-mt-24">
            <h3 class="text-3xl font-bold text-[var(--primary-color)] mb-6 text-center">諮商同意書</h3>
            <p class="text-[var(--primary-light)] text-center mb-8">請詳閱並了解諮商服務相關規範</p>
            <div class="text-center">
                <a href="/agreement" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-3 rounded-full hover:bg-[var(--primary-light)] transition duration-300">查看同意書</a>
            </div>
        </div>
    </div>
</div>

<!-- Column Section - 諮商專欄 -->
<div id="column" class="py-24 bg-[var(--text-light)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">諮商專欄</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">分享專業知識與心理健康資訊</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- 專欄文章 1-6 (類似最新消息的結構) -->
            <div class="bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/environment/1.jpg" alt="專欄文章1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">2024-01-20</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">如何培養良好的情緒管理能力</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">在現代生活中，良好的情緒管理能力變得越來越重要...</p>
                    <a href="/column/1" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                </div>
            </div>

            <!-- 專欄文章 2-6 -->
            <div class="bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/environment/2.jpg" alt="專欄文章2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">2024-01-18</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">建立健康的人際界線</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">學習如何在關係中設立適當的界線，維護自己的心理健康...</p>
                    <a href="/column/2" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Appointment Section - 諮商預約 -->
<div id="appointment" class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">諮商預約</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">簡單便捷的預約流程，讓您輕鬆安排諮商時間</p>
        </div>

        <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">預約須知</h3>
                    <ul class="space-y-4 text-[var(--primary-light)]">
                        <li>• 初次諮商建議預約90分鐘</li>
                        <li>• 請提前10分鐘到達</li>
                        <li>• 如需取消請提前24小時告知</li>
                        <li>• 可使用健保卡預約</li>
                    </ul>
                </div>
                <div class="text-center md:text-right self-center">
                    <a href="/booking" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-4 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">立即預約</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course Section - 講座課程 -->
<div id="courses" class="py-24 bg-[var(--text-light)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">講座課程</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">豐富多元的心理健康講座與工作坊</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- 講座課程 1 -->
            <div class="bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/environment/3.jpg" alt="講座課程1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">2024-02-01 14:00 ~ 16:00</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">壓力管理工作坊</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">學習實用的壓力管理技巧，建立健康的生活方式...</p>
                    <a href="/courses/1" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">了解更多</a>
                </div>
            </div>

            <!-- 講座課程 2 -->
            <div class="bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/environment/4.jpg" alt="講座課程2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">2024-02-15 19:00 ~ 21:00</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">親子溝通技巧講座</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">探討有效的親子溝通方式，建立良好的家庭關係...</p>
                    <a href="/courses/2" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">了解更多</a>
                </div>
            </div>

            <!-- 講座課程 3-6 使用類似結構 -->
        </div>
    </div>
</div>
@endsection
