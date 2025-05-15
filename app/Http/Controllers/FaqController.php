<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Services\SeoService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function frontIndex()
    {
        $faqs = Faq::orderBy('order')->get();
        $faqs = $faqs->map(function (Faq $faq) {
            $faq->answer = $this->autoLink($faq->answer);
            return $faq;
        });
        $seoData = $this->seoService->getFaqSeoData($faqs);

        return view('faq.index', compact('faqs', 'seoData'));
    }

    private function autoLink($text)
    {
        // 先處理 email
        $text = preg_replace(
            '/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/',
            '<a href="mailto:$1" class="underline text-[var(--primary-color)]">$1</a>',
            $text
        );

        // 再處理網址
        $text = preg_replace(
            '/(https?:\/\/[\w\-\.\/\?\#\=\&\%]+)/i',
            '<a href="$1" target="_blank" class="underline text-[var(--primary-color)]">$1</a>',
            $text
        );
        return $text;
    }
}
