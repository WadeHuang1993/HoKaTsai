@extends('layouts.layout')

@section('content')
<!-- about Section - 諮商所介紹 -->
<div id="about" class="relative min-h-screen bg-[var(--background-color)]">
    <div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">
        <!-- 左側環境照片 -->
        <div class="relative h-128 md:h-full">
            <img src="/images/environment/waiting_room_5.jpg" alt="好家在心理諮商所等候室環境，提供舒適的諮商空間" class="w-full h-full object-cover">
        </div>

        <!-- 右側文字內容 -->
        <div class="relative" style="background-image: url('/images/others/wood_card.png'); background-size: cover; background-position: center;">
            <div class="relative z-10 p-8 md:p-12 flex flex-col justify-center h-full">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[var(--text-light)] mb-6 md:mb-8 tracking-tight">好家在心理諮商所</h1>
                <p class="text-lg md:text-xl lg:text-2xl text-[var(--text-light)] mb-4 md:mb-6 leading-relaxed">專業溫暖的心理諮商服務，陪伴您探索內在、找回平靜</p>
                <p class="text-base md:text-lg text-[var(--text-light)] mb-8 md:mb-10 leading-relaxed">我們致力於提供安全、專業的心理諮商環境，協助您面對生活中的各種挑戰，重拾內在力量與平衡。</p>
                <a href="{{route('home')}}#appointment" class="inline-block bg-[var(--background-color)] text-[var(--primary-color)] px-8 md:px-10 py-3 md:py-4 rounded-full text-lg font-semibold hover:bg-[var(--text-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">預約諮商</a>
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($latestNews as $news)
                <a href="{{ route('news.show', $news->_id) }}" class="block bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 cursor-pointer">
                    <img src="{{ $news->image ? Storage::url($news->image) : '/images/environment/1.jpg' }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-[var(--primary-light)] mb-2">{{ $news->created_at->format('Y-m-d') }}</div>
                        <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $news->title }}</h3>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ strip_tags(str_replace('&nbsp;', ' ', $news->content)) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        @if($latestNews->count() > 6)
        <div class="text-center">
            <a href="{{ route('news.index') }}" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-3 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">查看全部消息</a>
        </div>
        @endif
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
            @foreach($teamMembers as $member)
                <a href="{{ route('team.show', $member->_id) }}" class="bg-[var(--background-color)] p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300 block group">
                    <img src="{{ $member->image }}" alt="{{ $member->name }}諮商師" class="w-48 h-64 rounded-xl mx-auto mb-6 object-cover group-hover:scale-105 transition duration-300">
                    <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-3 text-center">{{ $member->name }}</h3>
                    <p class="text-[var(--primary-light)] text-center">{{ $member->title }}</p>
                    @if($member->license_number)
                        <p class="text-xs text-gray-500 text-center">{{ $member->license_number }}</p>
                    @endif
                    @if($member->organization)
                        <p class="text-[var(--primary-light)] text-center">{{ $member->organization }}</p>
                    @endif
                    <p class="text-[var(--primary-light)] mt-4 leading-relaxed text-center">
                        {{ is_array($member->specialized_approaches) ? implode('、', $member->specialized_approaches) : $member->specialized_approaches }}
                    </p>
                </a>
            @endforeach
        </div>

        <!-- Space Section - 諮商空間 -->
        <div id="space" class="py-24 bg-[var(--text-light)]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">諮商空間</h2>
                    <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">溫馨舒適的環境，讓您安心放鬆</p>
                </div>
                <div class="environment_space grid grid-cols-4 gap-4">
                    @foreach($environmentImages as $img)
                        <div class="col-span-4 md:col-span-1">
                            <img src="{{ $img->image ? Storage::url($img->image) : '' }}" alt="{{ $img->title }}" class="w-full h-64 object-cover rounded-xl hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                </div>
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
            @foreach($services as $service)
                <div class="block bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $service->title }}</h3>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-4 text-justify">{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 諮商預約流程圖 -->
        <div class="max-w-5xl mx-auto mb-16">
            <h3 class="text-3xl font-bold text-[var(--primary-color)] mb-8 text-center">諮商預約流程</h3>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center border-2 border-[var(--primary-light)]">
                    <div class="w-10 h-10 flex items-center justify-center bg-[var(--primary-light)] text-white rounded-full text-xl font-bold mb-2">1</div>
                    <div class="font-bold mb-1">LINE 或填表預約</div>
                    <div class="text-sm text-gray-500">選擇LINE或線上表單預約，留下基本需求</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center border-2 border-[var(--primary-light)]">
                    <div class="w-10 h-10 flex items-center justify-center bg-[var(--primary-light)] text-white rounded-full text-xl font-bold mb-2">2</div>
                    <div class="font-bold mb-1">專人依需求回覆</div>
                    <div class="text-sm text-gray-500">由專人回覆，協助釐清您的諮商需求</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center border-2 border-[var(--primary-light)]">
                    <div class="w-10 h-10 flex items-center justify-center bg-[var(--primary-light)] text-white rounded-full text-xl font-bold mb-2">3</div>
                    <div class="font-bold mb-1">媒合時間與心理師</div>
                    <div class="text-sm text-gray-500">依您的狀況媒合合適心理師與晤談時間</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center border-2 border-[var(--primary-light)]">
                    <div class="w-10 h-10 flex items-center justify-center bg-[var(--primary-light)] text-white rounded-full text-xl font-bold mb-2">4</div>
                    <div class="font-bold mb-1">完成預約</div>
                    <div class="text-sm text-gray-500">以LINE或mail通知預約結果與細節</div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center border-2 border-[var(--primary-light)]">
                    <div class="w-10 h-10 flex items-center justify-center bg-[var(--primary-light)] text-white rounded-full text-xl font-bold mb-2">5</div>
                    <div class="font-bold mb-1">開始晤談</div>
                    <div class="text-sm text-gray-500">由專業心理師開始晤談服務</div>
                </div>
            </div>
        </div>
        <!-- /諮商預約流程圖 -->

        <!-- 合作專案 -->
        <div id="cooperation" class="bg-[var(--text-light)] p-8 rounded-xl mb-20 scroll-mt-24">
            <h3 class="text-3xl font-bold text-[var(--primary-color)] mb-6 text-center">合作專案</h3>
            <p class="text-[var(--primary-light)] text-center mb-8">我們與多個機構合作，提供專業的心理健康服務</p>
            <!-- 合作項目列表 -->
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($latestArticles as $article)
                <a href="{{ route('articles.show', $article->_id) }}" class="block bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 h-full">
                    @if($article->image)
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="text-sm text-[var(--primary-light)] mb-2">{{ $article->created_at->format('Y-m-d') }}</div>
                        <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $article->title }}</h3>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ strip_tags(str_replace('&nbsp;', ' ', $article->content)) }}</p>
                        @if($article->tags)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($article->tags as $tag)
                                <span class="px-3 py-1 bg-[var(--background-color)] text-[var(--primary-color)] rounded-full text-sm">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @endif
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-[var(--primary-light)]">{{ $article->teamMember->name }} - {{ $article->teamMember->title }}</span>
                            <span class="text-[var(--primary-color)] group-hover:text-[var(--primary-light)] transition duration-300">閱讀更多</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @if($latestArticles->count() > 6)
        <div class="text-center">
            <a href="{{ route('articles.index') }}" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-3 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">查看全部專欄</a>
        </div>
        @endif
    </div>
</div>

<!-- Appointment Section - 諮商預約 -->
<div id="appointment" class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">諮商預約</h2>
        </div>

        <div class="bg-[var(--text-light)] p-8 rounded-xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-[var(--primary-color)] mb-4">預約須知</h3>
                    <div class="space-y-6">
                        <div>
                            <ul class="space-y-3 text-[var(--primary-light)]">
                                <li class="flex items-start">
                                    <span class="mr-2">•</span>
                                    <span>請提早10分鐘抵達，填寫資料與簽署同意書。</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2">•</span>
                                    <span>請攜帶可證明身份的證件（身分證、健保卡或駕照）。</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2">•</span>
                                    <span>如需取消，請提前24小時通知我們。</span>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-[var(--background-color)] p-4 rounded-lg">
                            <p class="text-[var(--primary-light)] leading-relaxed">
                                第一次諮商感到緊張、擔心或不知道怎麼開始，都是很正常的事。
                            </p>
                            <p class="text-[var(--primary-light)] leading-relaxed">請放心，心理師會陪您探索合適主題。</p>
                            <p class="text-[var(--primary-light)] leading-relaxed">謝謝您選擇好家在，也願意為自己踏出這一步。</p>
                        </div>
                    </div>
                </div>
                <div class="text-center md:text-right self-center">
                    <a href="/appointment" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-4 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">立即預約</a>
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
            @foreach($latestCourses as $course)
                <a href="{{ route('courses.show', $course->_id) }}" class="block bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-[var(--primary-light)] mb-2">
                            上課日期：{{ $course->start_date->format('Y-m-d') }}
                        </div>
                        <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $course->title }}</h3>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ strip_tags(str_replace('&nbsp;', ' ', $course->description)) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        @if($latestCourses->count() > 6)
        <div class="btn-all-courses text-center mt-12">
            <a href="{{ route('courses.index') }}" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-3 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">查看全部講座</a>
        </div>
        @endif
    </div>
</div>
@endsection
