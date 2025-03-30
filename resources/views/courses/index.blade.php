@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--text-light)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">講座課程</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">豐富多元的心理健康講座與工作坊</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($courses as $course)
            <div class="bg-[var(--background-color)] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-[var(--primary-light)] mb-2">{{ $course['datetime'] }}</div>
                    <h3 class="text-xl font-bold text-[var(--primary-color)] mb-3">{{ $course['title'] }}</h3>
                    <p class="text-[var(--primary-light)] mb-4 line-clamp-3">{{ $course['description'] }}</p>
                    <a href="/courses/{{ $course['id'] }}" class="text-[var(--primary-color)] hover:text-[var(--primary-light)] transition duration-300">了解更多</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection