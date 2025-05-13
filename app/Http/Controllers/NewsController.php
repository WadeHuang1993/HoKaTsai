<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $newsList = News::orderBy('_id', 'desc')
            ->paginate(10);

        return view('news.index', compact('newsList'));
    }

    public function show($newsId)
    {
        $news = News::findOrFail($newsId);
        return view('news.show', compact('news'));
    }
}
