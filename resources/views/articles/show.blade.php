@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-[var(--text-light)] rounded-xl overflow-hidden shadow-lg p-8">
            <header class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-[var(--primary-color)] mb-4">{{ $article['title'] }}</h1>
                <div class="flex flex-wrap items-center gap-4 text-[var(--primary-light)] mb-6">
                    <span>{{ $article['date'] }}</span>
                    <span>{{ $article['author'] }}</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach($article['tags'] as $tag)
                    <span class="px-3 py-1 bg-[var(--background-color)] text-[var(--primary-color)] rounded-full text-sm">{{ $tag }}</span>
                    @endforeach
                </div>
            </header>

            <div class="prose prose-lg max-w-none text-[var(--primary-light)]">
                {!! $article['content'] !!}
            </div>
        </article>
    </div>
</div>
@endsection
