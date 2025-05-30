@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg p-8">
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

            @if($article->image)
            <div class="mb-8">
                <img src="{{ asset('storage/' . $article->image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-auto rounded-lg shadow-md">
            </div>
            @endif

            <div class="prose prose-lg max-w-none text-[var(--primary-light)]">
                {!! $article->content !!}
            </div>
        </article>

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
    </div>
</div>
@endsection
