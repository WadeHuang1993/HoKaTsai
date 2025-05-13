@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg">
            <!-- 新聞圖片 -->
            <div class="relative h-96">
                <img src="{{ $news->image ? Storage::url($news->image) : '/images/environment/1.jpg' }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-[var(--text-light)] text-center px-4">{{ $news->title }}</h1>
                </div>
            </div>

            <!-- 新聞內容 -->
            <div class="p-8 md:p-12">
                <div class="text-[var(--primary-light)] mb-8">發布日期：{{ $news->created_at->format('Y-m-d') }}</div>
                <div class="prose prose-lg max-w-none text-[var(--primary-light)]">
                    {!! $news->content !!}
                </div>

                <!-- 返回按鈕 -->
                <div class="mt-12 text-center">
                    <a href="{{ route('news.index') }}" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-3 rounded-full hover:bg-[var(--primary-light)] transition duration-300">
                        返回最新消息
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
