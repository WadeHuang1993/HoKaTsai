<?php

namespace App\Http\Controllers;

use App\Libraries\Formatter;
use App\Models\EnvironmentImage;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TeamMember;
use App\Models\News;
use App\Models\Article;
use App\Models\CounselingService;
use App\Services\SeoService;
use Illuminate\View\View;
use App\Models\Partner;

class HomeController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    /**
     * 顯示應用程序的首頁
     *
     * @return View
     */
    public function index()
    {
        $latestNews = News::orderBy('_id', 'desc')->where('status', true)->take(6)->get();
        $teamMembers = TeamMember::orderBy('order')->where('show_in_homepage', true)->get();
        $environmentImages = EnvironmentImage::orderBy('order')->get();
        $latestArticles = Article::with('teamMember')->where('status', true)->orderBy('_id', 'desc')->take(6)->get();
        $latestCourses = Course::orderBy('start_date', 'desc')->take(6)->get();
        $services = CounselingService::orderBy('order')->get();
        $partners = Partner::orderBy('order')->get();
        $seoData = $this->seoService->getHomeSeoData();

        $partners = $partners->map(function (Partner $partner) {
            $partner->description = Formatter::autoLink($partner->description);
            return $partner;
        });

        return view('home', compact(
            'latestNews',
            'teamMembers',
            'environmentImages',
            'latestArticles',
            'latestCourses',
            'services',
            'partners',
            'seoData'
        ));
    }
}
