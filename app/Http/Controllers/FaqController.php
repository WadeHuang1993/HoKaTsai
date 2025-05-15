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
        $seoData = $this->seoService->getFaqSeoData($faqs);
        
        return view('faq.index', compact('faqs', 'seoData'));
    }
} 