<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TeamMember;
use App\Models\News;
use App\Models\Article;

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

        $teamMembers = TeamMember::orderBy('_id', 'asc')
            ->where('show_in_homepage', true)
            ->take(6)
            ->get();

        $latestNews = News::orderBy('_id', 'desc')
            ->where('status', true)
            ->take(6)
            ->get();

        $latestArticles = Article::with('teamMember')
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $environmentImages = \App\Models\EnvironmentImage::orderBy('created_at', 'desc')->get();

        return view('home', compact('latestCourses', 'teamMembers', 'latestNews', 'latestArticles', 'environmentImages'));
    }
}
