<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class FaqController extends Controller
{
    public function frontIndex()
    {
        $faqs = Faq::where('status', true)->orderBy('order')->get();
        return view('faq.index', compact('faqs'));
    }
} 