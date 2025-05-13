<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * 顯示應用程序的首頁
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $latestCourses = Course::with('teamMember')
            ->orderBy('start_date', 'desc')
            ->take(6)
            ->get();

        return view('home', compact('latestCourses'));
    }
}