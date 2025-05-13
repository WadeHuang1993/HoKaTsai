@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">講座課程</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-3xl mx-auto">豐富多元的心理健康講座與工作坊</p>
        </div>

        <div class="space-y-6">
            @foreach($courses as $course)
            <a href="{{ route('courses.show', $course->_id) }}" class="block bg-[var(--text-light)] rounded-lg overflow-hidden shadow hover:shadow-xl transition duration-300 cursor-pointer">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/4 h-48 md:h-60 flex items-center justify-center bg-gray-100">
                        <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="object-cover object-center w-full h-full rounded-none">
                    </div>
                    <div class="flex-1 p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-[var(--primary-color)]">{{ $course->title }}</h3>
                            <div class="text-sm text-[var(--primary-light)]">
                                上課日期：{{ $course->start_date->format('Y-m-d') }}
                            </div>
                        </div>
                        <p class="text-[var(--primary-light)] mb-4 line-clamp-2">{{ strip_tags($course->description) }}</p>
                        <div class="flex justify-between items-center">
                            <div class="text-[var(--primary-light)]">
                                <span class="mr-4">講師：{{ $course->teamMember->name }}</span>
                                <span>地點：{{ $course->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection