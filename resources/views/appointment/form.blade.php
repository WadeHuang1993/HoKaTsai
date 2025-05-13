@extends('layouts.layout')

@section('title', '預約諮商')

@section('content')
<div class="max-w-lg mx-auto py-16">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-[var(--primary-color)] mb-6">預約諮商</h1>
        <div class="mb-8 text-[var(--primary-light)] leading-relaxed">

            <p class="mb-2">我們的諮商預約採「預約制」，請您留下以下資訊：</p>
            <p>我們的個案管理師會於上班時間陸續與您接洽，請您稍等，謝謝您😊</p>
        </div>
        @if(session('success'))
            <div class="alert alert-success text-green-700 bg-green-100 border border-green-300 rounded p-4 mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('appointment.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 font-semibold">稱呼 <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror" required>
                @error('name')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">電子信箱 <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror" required>
                @error('email')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 font-semibold">電話號碼 <span class="text-red-500">*</span></label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded px-3 py-2 @error('phone') border-red-500 @enderror" required>
                @error('phone')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex justify-center mt-8">
                <button type="submit" class="bg-[var(--primary-color)] text-white px-8 py-3 rounded-full font-semibold hover:bg-[var(--primary-light)] transition">送出表單</button>
            </div>
        </form>
    </div>
</div>
@endsection
