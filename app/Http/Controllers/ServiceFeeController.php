<?php

namespace App\Http\Controllers;

use App\Models\ServiceFee;

class ServiceFeeController extends Controller
{
    public function index()
    {
        $fees = ServiceFee::orderBy('order')->get();
        return view('service_fees.index', compact('fees'));
    }
} 