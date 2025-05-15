<?php

namespace App\Http\Controllers;

use App\Models\ServiceFee;
use App\Models\TeamMember;
use App\Services\SeoService;

class ServiceFeeController extends Controller
{
    protected $seoService;
    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }
    public function index()
    {
        $fees = ServiceFee::orderBy('order')->get();
        $seoData = $this->seoService->getServiceFeeSeoData($fees);
        return view('service_fees.index', compact('fees', 'seoData'));
    }
}
