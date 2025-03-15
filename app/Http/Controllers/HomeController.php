<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 顯示應用程序的首頁
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}