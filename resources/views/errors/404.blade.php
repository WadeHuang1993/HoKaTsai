@extends('layouts.layout')

@section('title', '找不到頁面 - 心理諮商所')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center py-12">
    <h1 class="text-3xl font-bold text-yellow-900 mb-4">這裡好像沒有你要找的內容</h1>
    <p class="text-lg text-yellow-700 mb-6">
        沒關係，有時候我們都會迷路，<br>
        也許你可以回首頁，或是慢慢探索其他心理健康的資源。<br>
        如果需要協助，歡迎隨時和我們聯絡。
    </p>
    <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-yellow-600 text-white rounded shadow hover:bg-yellow-700 transition">
        回到首頁
    </a>
</div>
@endsection 