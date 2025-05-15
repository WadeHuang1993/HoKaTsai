@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- 頁面標題 -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-4">心理專欄</h1>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">
                由專業心理師撰寫的心理健康文章，幫助您更了解自己，提升生活品質。
            </p>
        </div>

        <!-- 文章列表 -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <article class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <!-- 文章封面圖 -->
                <a href="{{ route('articles.show', $article->_id) }}" class="block relative">
                    <img src="{{ Storage::url($article->image) }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-48 object-cover"
                         loading="lazy">
                </a>

                <!-- 文章內容 -->
                <div class="p-6">
                    <!-- 文章標題 -->
                    <h2 class="text-xl font-bold text-[var(--primary-color)] mb-3">
                        <a href="{{ route('articles.show', $article->_id) }}" class="hover:text-[var(--primary-light)] transition duration-300">
                            {{ $article->title }}
                        </a>
                    </h2>

                    <!-- 文章摘要 -->
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">
                        {{ $article->summary }}
                    </p>

                    <!-- 文章資訊 -->
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <div class="flex items-center">
                            <img src="{{ $article->teamMember->image }}" 
                                 alt="{{ $article->teamMember->name }}" 
                                 class="w-8 h-8 rounded-full mr-2"
                                 loading="lazy">
                            <span>{{ $article->teamMember->name }}</span>
                        </div>
                        <time datetime="{{ $article->created_at->format('Y-m-d') }}">
                            {{ $article->created_at->format('Y/m/d') }}
                        </time>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- 分頁 -->
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
