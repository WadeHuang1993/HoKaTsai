<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('articles.index', compact('articles'));
    }

    public function show(string $id)
    {
        $article = Article::where('status', true)
            ->findOrFail($id);

        // 取得相關文章（相同標籤的文章）
        $relatedArticles = Article::where('status', true)
            ->where('_id', '!=', $id)
            ->where('tag', $article->tag)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}
