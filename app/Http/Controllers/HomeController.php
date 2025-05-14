<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentImage;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TeamMember;
use App\Models\News;
use App\Models\Article;
use App\Models\CounselingService;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * 顯示應用程序的首頁
     *
     * @return View
     */
    public function index()
    {
        $latestNews = News::orderBy('created_at', 'desc')->take(6)->get();
        $teamMembers = TeamMember::orderBy('order')->get();
        $environmentImages = EnvironmentImage::orderBy('order')->get();
        $latestArticles = Article::with('teamMember')->orderBy('created_at', 'desc')->take(6)->get();
        $latestCourses = Course::orderBy('start_date', 'desc')->take(6)->get();
        $services = CounselingService::orderBy('order')->get();
        return view('home', compact(
            'latestNews',
            'teamMembers',
            'environmentImages',
            'latestArticles',
            'latestCourses',
            'services'
        ));
    }
}
