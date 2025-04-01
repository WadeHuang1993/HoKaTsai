@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">心理專欄</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">探索心理健康的專業觀點與實用建議</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($articles as $article)
            <div class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">{{ $article['date'] }}</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $article['title'] }}</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ strip_tags($article['content']) }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($article['tags'] as $tag)
                        <span class="px-3 py-1 bg-[var(--background-color)] text-[var(--primary-color)] rounded-full text-sm">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[var(--primary-light)]">{{ $article['author'] }}</span>
                        <a href="{{ route('articles.show', $article['id']) }}" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection