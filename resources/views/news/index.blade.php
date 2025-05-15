@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h1 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">最新消息</h1>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">了解我們的最新動態與活動資訊</p>
        </div>

        <div class="space-y-6">
            @foreach($newsList as $news)
            <article class="block bg-[var(--text-light)] rounded-lg overflow-hidden shadow hover:shadow-lg hover:shadow-xl transition duration-300 cursor-pointer">
                <a href="{{ route('news.show', $news->_id) }}" class="flex flex-col md:flex-row">
                    <div class="md:w-1/4 h-48 md:h-60 flex items-center justify-center bg-gray-100">
                        <img src="{{ $news->image ? Storage::url($news->image) : '/images/environment/1.jpg' }}" alt="{{ $news->title }}" class="object-cover object-center w-full h-full rounded-none">
                    </div>
                    <div class="flex-1 p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="text-xl font-bold text-[var(--primary-color)]">{{ $news->title }}</h2>
                            <time class="text-sm text-[var(--primary-light)]" datetime="{{ $news->created_at->format('Y-m-d') }}">{{ $news->created_at->format('Y-m-d') }}</time>
                        </div>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-2">{{ html_entity_decode(strip_tags($news->content)) }}</p>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $newsList->links() }}
        </div>
    </div>
</div>
@endsection
