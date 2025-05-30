@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- 課程標題區 -->
        <div class="mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-4">{{ $course->title }}</h1>
            <div class="flex flex-wrap gap-4 text-[var(--primary-light)]">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $course->start_date->format('Y-m-d H:i') }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $course->location }}</span>
                </div>
            </div>
        </div>

        <!-- 主要內容區 -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- 左側內容 -->
            <div class="lg:col-span-2">
                <!-- 課程封面圖 -->
                <div class="mb-8">
                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-96 object-cover rounded-xl">
                </div>

                <!-- 課程介紹 -->
                <div class="bg-[var(--text-light)] p-8 rounded-xl mb-8">
                    <h2 class="text-2xl font-bold text-[var(--primary-color)] mb-6">課程介紹</h2>
                    <div class="prose max-w-none text-[var(--primary-light)]">
                        {!! $course->description !!}
                    </div>
                </div>

                <!-- 課程流程 -->
                <div class="bg-[var(--text-light)] p-8 rounded-xl mb-8">
                    <h2 class="text-2xl font-bold text-[var(--primary-color)] mb-6">課程流程</h2>
                    <div class="space-y-4 text-[var(--primary-light)]">
                        @foreach($course->schedule as $schedule)
                        <div class="flex items-start">
                            <span class="font-semibold w-24">{{ $schedule['time'] }}</span>
                            <span>{{ $schedule['content'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 講師介紹 -->
                <div class="bg-[var(--text-light)] p-8 rounded-xl">
                    <h2 class="text-2xl font-bold text-[var(--primary-color)] mb-6">講師介紹</h2>
                    <div class="flex items-start space-x-6">
                        <img src="{{ $course->teamMember->image }}" alt="{{ $course->teamMember->name }}講師" class="w-48 h-64 rounded-xl object-cover">
                        <div>
                            <h3 class="text-xl font-bold text-[var(--primary-color)] mb-2">{{ $course->teamMember->name }}</h3>
                            <p class="text-[var(--primary-light)]">{{ $course->teamMember->title }}</p>
                            @if($course->teamMember->license_number)<p class="text-xs text-gray-500 mb-2">{{ $course->teamMember->license_number }}</p>@endif
                        @if($course->teamMember->organization)
                                <p class="text-[var(--primary-light)] mb-4">{{ $course->teamMember->organization }}</p>
                            @endif
                            <div class="text-[var(--primary-light)]">
                                @if($course->teamMember->specialties)
                                    <p class="font-semibold mb-2">關注議題：</p>
                                    <ul class="list-disc list-inside mb-4">
                                        @foreach($course->teamMember->specialties as $specialty)
                                            <li>{{ $specialty }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if($course->teamMember->education)
                                    <p class="font-semibold mb-2">學歷：</p>
                                    <ul class="list-disc list-inside mb-4">
                                        @foreach($course->teamMember->education as $edu)
                                            <li>{{ $edu }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if($course->teamMember->work_experience)
                                    <p class="font-semibold mb-2">重要經歷：</p>
                                    <ul class="list-disc list-inside mb-4">
                                        @foreach($course->teamMember->work_experience as $exp)
                                            <li>{{ $exp }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 右側報名資訊 -->
            <div class="lg:col-span-1">
                <div class="bg-[var(--text-light)] p-8 rounded-xl sticky top-24">
                    <h2 class="text-2xl font-bold text-[var(--primary-color)] mb-6">報名資訊</h2>
                    <div class="space-y-4 text-[var(--primary-light)] mb-8">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>名額限制：{{ $course->max_participants }} 人</span>
                        </div>
                        @if ($course->remaining_slots <= 5)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>剩餘名額：{{ $course->remaining_slots }} 人</span>
                        </div>
                        @endif
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>報名費：NT$ {{ number_format($course->price) }}</span>
                        </div>
                    </div>

                    <!-- 注意事項 -->
                    <div class="mb-8">
                        <h3 class="font-bold text-[var(--primary-color)] mb-3">注意事項：</h3>
                        <ul class="list-disc list-inside space-y-2 text-[var(--primary-light)]">
                            @foreach($course->notes as $note)
                            <li>{{ $note }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- 報名按鈕 -->
                    @if($course->google_form_url)
                    <a href="{{ $course->google_form_url }}" target="_blank" class="block w-full bg-[var(--primary-color)] text-[var(--text-light)] text-center px-6 py-4 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">立即報名</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
