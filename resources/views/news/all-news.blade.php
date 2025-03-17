@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">最新消息</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">了解我們的最新動態與活動資訊</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($newsList as $item)
            <div class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="{{ $item['image_url'] ?? '/images/environment/1.jpg' }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">{{ $item['date'] }}</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $item['title'] }}</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ $item['content'] }}</p>
                    <a href="{{ route('news.show', $item['id']) }}" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $paginator->links() }}
        </div>
    </div>
</div>
@endsection
