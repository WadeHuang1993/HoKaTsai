@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg p-8">
            @if($article->image)
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $article->image) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-auto rounded-lg shadow-md">
                </div>
            @endif
            <header class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-[var(--primary-color)] mb-4">{{ $article->title }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-[var(--primary-light)] mb-6">
                    <span>{{ $article->created_at->format('Y-m-d') }}</span>
                    <span>{{ $article->teamMember->name }} - {{ $article->teamMember->title }}</span>
                </div>
                @if($article->tags)
                <div class="flex flex-wrap gap-2">
                    @foreach($article->tags as $tag)
                        <span class="px-3 py-1 bg-[var(--background-color)] text-[var(--primary-color)] rounded-full text-sm">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
            </header>

            {{-- 懶人包圖片區塊 --}}
            @if($article->lazy_images && count($article->lazy_images) > 0)
                <div class="mb-8 flex justify-center -mx-4 sm:-mx-6 ">
                    <div class="swiper swiper-theme-warm lazy-swiper w-full h-[400px] sm:h-[400px] md:h-[400px] lg:h-[600px]">
                        <div class="swiper-wrapper">
                            @foreach($article->lazy_images as $img)
                                <div class="swiper-slide flex items-center justify-center h-[400px] sm:h-[400px] md:h-[400px] lg:h-[600px]">
                                    <img src="{{ asset('storage/' . $img) }}"
                                         alt="懶人包圖片"
                                         class="w-full h-full object-contain rounded-lg shadow-md bg-white" />
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            @endif
            {{-- 懶人包圖片區塊 --}}

            <div class="prose prose-lg max-w-none text-[var(--primary-light)]">
                {!! $article->content !!}
            </div>

            @if($relatedArticles->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-[var(--primary-color)] mb-6">相關文章</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedArticles as $relatedArticle)
                    <a href="{{ route('articles.show', $relatedArticle->_id) }}" class="block">
                        <div class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 h-full">
                            <div class="p-6">
                                <div class="text-sm text-[var(--primary-light)] mb-2">{{ $relatedArticle->created_at->format('Y-m-d') }}</div>
                                <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $relatedArticle->title }}</h3>
                                <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ strip_tags($relatedArticle->content) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-[var(--primary-light)]">{{ $relatedArticle->teamMember->name }} - {{ $relatedArticle->teamMember->title }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </article>
    </div>
</div>
@endsection

@section('js')
<style>
/* Swiper arrows 只保留 icon，無底色 */
.swiper-button-next,
.swiper-button-prev {
    color: #D6B77A !important;
    background: none !important;
    border-radius: 0;
    width: 44px;
    height: 44px;
    box-shadow: none;
    transition: color 0.2s;
}
.swiper-button-next:hover,
.swiper-button-prev:hover {
    color: #b08a4a !important;
}
.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 28px;
}
/* Swiper 分頁點點 */
.swiper-pagination-bullet {
    background: #E9CBA7 !important;
    opacity: 1;
}
.swiper-pagination-bullet-active {
    background: #D6B77A !important;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.lazy-swiper', {
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        spaceBetween: 16,
    });
});
</script>
@endsection
