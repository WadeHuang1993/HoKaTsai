@extends('layouts.layout')

@section('content')
<div class="py-24 bg-[var(--background-color)] min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--primary-color)] mb-6">常見問題</h2>
            <p class="text-xl text-[var(--primary-light)] max-w-2xl mx-auto">心理諮商相關常見問題與解答</p>
        </div>
        <div id="faq-accordion" class="space-y-6">
            @foreach($faqs as $faq)
                <div class="bg-[var(--text-light)] rounded-xl shadow p-6">
                    <div class="w-full text-left flex items-center justify-between">
                        <span class="text-lg font-semibold text-[var(--primary-color)]">Q. {{ $faq->question }}</span>
                    </div>
                    <div class="faq-answer mt-4 text-[var(--primary-light)]">
                        {!! nl2br($faq->answer) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.faq-toggle').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const answer = btn.parentElement.querySelector('.faq-answer');
                if (answer.classList.contains('hidden')) {
                    document.querySelectorAll('.faq-answer').forEach(el => el.classList.add('hidden'));
                    answer.classList.remove('hidden');
                } else {
                    answer.classList.add('hidden');
                }
            });
        });
    });
</script>
@endpush 