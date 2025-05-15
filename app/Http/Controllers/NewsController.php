<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;
use App\Services\SeoService;

class NewsController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index(Request $request)
    {
        $newsList = News::orderBy('_id', 'desc')
            ->where('status', true)
            ->paginate(10);

        $seoData = $this->seoService->getNewsListSeoData($newsList);

        return view('news.index', compact('newsList', 'seoData'));
    }

    public function show($newsId)
    {
        $news = News::findOrFail($newsId);
        if ((bool) $news->status !== true) {
            abort(404);
        }

        $seoData = $this->seoService->getNewsDetailSeoData($news);

        return view('news.show', compact('news', 'seoData'));
    }
}
