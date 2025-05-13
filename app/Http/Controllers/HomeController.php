<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TeamMember;
use App\Models\News;

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

        $teamMembers = TeamMember::orderBy('_id', 'desc')
            ->where('show_in_homepage', true)
            ->take(6)
            ->get();

        $latestNews = News::orderBy('_id', 'desc')
            ->where('status', true)
            ->take(6)
            ->get();

        return view('home', compact('latestCourses', 'teamMembers', 'latestNews'));
    }
}
