@extends('layouts.layout')

@section('title', '專業服務收費標準')

@section('content')
<div class="py-24 bg-[var(--background-color)] min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">諮商服務收費標準</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-2xl mx-auto"></p>
        </div>
        <div class="bg-[var(--text-light)] rounded-xl shadow p-8">
            <table class="w-full border-separate" style="border-spacing: 0 2.5rem;">
                <tbody>
                @foreach($fees as $fee)
                    <tr>
                        <td class="align-top w-2/3 pr-4">
                            <div class="text-xl font-semibold text-[var(--primary-color)] mb-1">{{ $fee->title }}</div>
                            @if($fee->subtitle)
                                <div class="text-gray-400 mb-1">{{ $fee->subtitle }}</div>
                            @endif
                            @if($fee->description)
                                <div class="text-[var(--primary-light)] text-sm">{{ $fee->description }}</div>
                            @endif
                        </td>
                        <td class="align-top w-1/3 text-right">
                            <span class="text-2xl font-light text-[var(--primary-color)]">{{ $fee->price }}</span><span class="text-base text-[var(--primary-light)]">元</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="text-center text-lg text-[var(--primary-light)] mt-8">
            諮商所收費方式：現金支付
        </div>
        <div class="text-center mt-6">
            <a href="/appointment" class="inline-block bg-[var(--primary-color)] text-[var(--text-light)] px-8 py-4 rounded-full text-lg font-semibold hover:bg-[var(--primary-light)] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">立即預約</a>
        </div>
    </div>
</div>
@endsection 