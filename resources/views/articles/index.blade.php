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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach($articles as $article)
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

        <!-- 分頁 -->
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
