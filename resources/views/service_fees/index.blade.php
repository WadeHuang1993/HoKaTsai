@extends('layouts.layout')

@section('title', '專業服務收費標準')

@section('content')
<div class="max-w-3xl mx-auto py-16">
    <h1 class="text-3xl md:text-4xl font-bold text-center mb-10 tracking-wide">專業服務收費標準</h1>
    <div class="bg-white rounded-xl shadow p-8">
        @foreach($fees as $fee)
            <div class="flex flex-col md:flex-row md:items-center justify-between py-6 border-b last:border-b-0">
                <div class="mb-2 md:mb-0">
                    <div class="text-xl font-semibold mb-1">{{ $fee->title }}</div>
                    @if($fee->subtitle)
                        <div class="text-gray-700 mb-1">{{ $fee->subtitle }}</div>
                    @endif
                    @if($fee->description)
                        <div class="text-gray-500 text-sm">{{ $fee->description }}</div>
                    @endif
                </div>
                <div class="text-2xl font-light text-right min-w-[120px]">
                    {{ $fee->price }}<span class="text-base">元</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 