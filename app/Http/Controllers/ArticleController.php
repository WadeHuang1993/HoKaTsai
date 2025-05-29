<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\SeoService;

class ArticleController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index(Request $request)
    {
        $articles = Article::with('teamMember')
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $seoData = $this->seoService->getArticleListSeoData($articles);

        return view('articles.index', compact('articles', 'seoData'));
    }

    public function show(string $id)
    {
        $article = Article::where('status', true)
            ->findOrFail($id);

        // 載入關聯的講師資料
        $article->load('teamMember');

        // 取得相關文章（相同標籤的文章）
        $tags = $article->tags;
        $relatedArticles = collect([]);
        foreach ($tags as $tag) {
            $unicodeTag = json_encode($tag);
            $matched = Article::where('status', true)
                ->where('_id', '!=', $id)
                ->where('tags', 'like', "%$unicodeTag%")
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            // 合併所有相關文章
            $relatedArticles = $relatedArticles->merge($matched);
        }

        // 去除重複的文章（使用 _id 判斷）
        $relatedArticles = $relatedArticles->unique(function ($article) {
            return $article->_id;
        });

        $seoData = $this->seoService->getArticleDetailSeoData($article);

        return view('articles.show', compact('article', 'relatedArticles', 'seoData'));
    }
}
