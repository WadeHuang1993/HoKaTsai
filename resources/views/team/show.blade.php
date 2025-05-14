@extends('layouts.layout')

@section('content')
<div class="max-w-3xl mx-auto py-12">
    <div class="bg-[var(--background-color)] p-8 rounded-xl shadow-lg">
        <div class="flex flex-col md:flex-row items-center md:space-x-8">
            <img src="{{ $member->image }}" alt="{{ $member->name }}" class="w-48 h-64 rounded-xl object-cover mb-6 md:mb-0">
            <div>
                <h2 class="text-3xl font-bold text-[var(--primary-color)] mb-2">{{ $member->name }}</h2>
                <p class="text-[var(--primary-light)] mb-1">{{ $member->title }}</p>
                @if($member->license_number)
                    <p class="text-xs text-gray-500 mb-1">{{ $member->license_number }}</p>
                @endif
                @if($member->organization)
                    <p class="text-[var(--primary-light)] mb-2">{{ $member->organization }}</p>
                @endif
                @if($member->self_introduction)
                    <p class="text-[var(--primary-light)] mb-4">{{ $member->self_introduction }}</p>
                @endif
            </div>
        </div>
        <div class="mt-8">
            @if($member->specialties)
                <h3 class="font-semibold text-[var(--primary-color)] mb-2">關注議題</h3>
                <ul class="list-disc list-inside mb-4">
                    @foreach($member->specialties as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            @if($member->specialized_approaches)
                <h3 class="font-semibold text-[var(--primary-color)] mb-2">專長取向</h3>
                <ul class="list-disc list-inside mb-4">
                    @foreach($member->specialized_approaches as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            @if($member->professional_trainings)
                <h3 class="font-semibold text-[var(--primary-color)] mb-2">專業訓練</h3>
                <ul class="list-disc list-inside mb-4">
                    @foreach($member->professional_trainings as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            @if($member->education)
                <h3 class="font-semibold text-[var(--primary-color)] mb-2">學歷</h3>
                <ul class="list-disc list-inside mb-4">
                    @foreach($member->education as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            @if($member->work_experience)
                <h3 class="font-semibold text-[var(--primary-color)] mb-2">重要經歷</h3>
                <ul class="list-disc list-inside mb-4">
                    @foreach($member->work_experience as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection 