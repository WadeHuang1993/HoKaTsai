@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">最新消息</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">了解我們的最新動態與活動資訊</p>
        </div>

        <div class="space-y-6">
            @foreach($newsList as $item)
            <div class="bg-[var(--text-light)] rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/4">
                        <img src="{{ $item['image_url'] ?? '/images/environment/1.jpg' }}" alt="{{ $item['title'] }}" class="w-full h-48 md:h-full object-cover">
                    </div>
                    <div class="flex-1 p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-[var(--primary-color)]">{{ $item['title'] }}</h3>
                            <div class="text-sm text-[var(--primary-light)]">{{ $item['date'] }}</div>
                        </div>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-2">{{ $item['content'] }}</p>
                        <a href="{{ route('news.show', $item['id']) }}" class="inline-block text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">閱讀更多</a>
                    </div>
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
