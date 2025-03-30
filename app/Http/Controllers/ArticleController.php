<?php

namespace App\Http\Controllers;

//use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            [
                'id' => 1,
                'title' => '如何面對生活中的焦慮',
                'content' => '<div class="article-section"><h2>認識焦慮</h2><p>在現代生活中，焦慮已成為許多人共同面對的挑戰。本文將分享一些實用的方法，幫助你更好地管理焦慮情緒。</p></div><div class="article-section"><h2>焦慮的來源</h2><p>首先，我們要學會識別焦慮的來源，理解它可能來自：</p><ul><li>工作壓力</li><li>人際關係</li><li>未來的不確定性</li></ul></div><div class="article-section"><h2>緩解焦慮的方法</h2><p>建立健康的生活習慣，如：</p><ul><li>規律運動</li><li>充足睡眠</li><li>均衡飲食</li></ul><p>這些都是幫助緩解焦慮的基本要素。</p></div>',
                'date' => '2024-01-20',
                'tags' => ['焦慮', '心理健康', '自我照顧'],
                'author' => '張心理師'
            ],
            [
                'id' => 2,
                'title' => '親子溝通的藝術',
                'content' => '<div class="article-section"><h2>親子溝通的重要性</h2><p>良好的親子關係需要雙方的用心經營。本文探討如何透過有效的溝通方式，建立更緊密的親子連結。</p></div><div class="article-section"><h2>傾聽的藝術</h2><p>傾聽是最重要的技巧，不僅要聽孩子說的話，更要理解話語背後的情感需求。</p></div><div class="article-section"><h2>有效溝通的要素</h2><ul><li>選擇適當的溝通時機</li><li>避免在情緒激動時進行重要對話</li><li>使用「我訊息」來表達感受</li><li>避免指責或批評</li></ul></div>',
                'date' => '2024-01-18',
                'tags' => ['親子關係', '溝通技巧', '家庭'],
                'author' => '李心理師'
            ],
            [
                'id' => 3,
                'title' => '走出情緒低潮的方法',
                'content' => '<div class="article-section"><h2>理解情緒低潮</h2><p>每個人都可能經歷情緒低潮，關鍵在於如何正確面對和處理。讓我們一起探討一些實用的調適方法。</p></div><div class="article-section"><h2>接納與覺察</h2><p>接納自己的情緒是很重要的，不要否認或壓抑負面情緒。</p></div><div class="article-section"><h2>調適方法</h2><ul><li>保持規律的作息</li><li>培養興趣愛好</li><li>參與社交活動</li><li>適當的運動</li></ul><p>這些都能幫助我們找到生活的平衡。</p></div>',
                'date' => '2024-01-15',
                'tags' => ['情緒管理', '心理健康', '自我成長'],
                'author' => '王心理師'
            ],
            [
                'id' => 4,
                'title' => '職場壓力調適指南',
                'content' => '<div class="article-section"><h2>職場壓力的挑戰</h2><p>現代職場中的壓力與日俱增，如何在工作與生活之間取得平衡？本文提供一些實用的壓力管理技巧。</p></div><div class="article-section"><h2>壓力管理策略</h2><ul><li>設定明確的工作界限</li><li>建立有效的時間管理系統</li><li>培養正向的工作心態</li><li>建立良好的同事關係</li></ul></div><div class="article-section"><h2>自我照顧</h2><p>適時的放鬆和休息是必要的，避免過度勞累。如果感到壓力過大，不要害怕尋求協助。</p></div>',
                'date' => '2024-01-12',
                'tags' => ['職場健康', '壓力管理', '工作與生活平衡'],
                'author' => '陳心理師'
            ]
        ];
        return view('articles.index', compact('articles'));
    }

    public function show(string $id)
    {
        $articles = [
            1 => [
                'id' => 1,
                'title' => '如何面對生活中的焦慮',
                'content' => '<div class="article-section"><h2>認識焦慮</h2><p>在現代生活中，焦慮已成為許多人共同面對的挑戰。本文將分享一些實用的方法，幫助你更好地管理焦慮情緒。</p></div><div class="article-section"><h2>焦慮的來源</h2><p>首先，我們要學會識別焦慮的來源，理解它可能來自：</p><ul><li>工作壓力</li><li>人際關係</li><li>未來的不確定性</li></ul></div><div class="article-section"><h2>緩解焦慮的方法</h2><p>建立健康的生活習慣，如：</p><ul><li>規律運動</li><li>充足睡眠</li><li>均衡飲食</li></ul><p>這些都是幫助緩解焦慮的基本要素。</p></div>',
                'date' => '2024-01-20',
                'tags' => ['焦慮', '心理健康', '自我照顧'],
                'author' => '張心理師',
                'related_articles' => [2, 3]
            ],
            2 => [
                'id' => 2,
                'title' => '親子溝通的藝術',
                'content' => '<div class="article-section"><h2>親子溝通的重要性</h2><p>良好的親子關係需要雙方的用心經營。本文探討如何透過有效的溝通方式，建立更緊密的親子連結。</p></div><div class="article-section"><h2>傾聽的藝術</h2><p>傾聽是最重要的技巧，不僅要聽孩子說的話，更要理解話語背後的情感需求。</p></div><div class="article-section"><h2>有效溝通的要素</h2><ul><li>選擇適當的溝通時機</li><li>避免在情緒激動時進行重要對話</li><li>使用「我訊息」來表達感受</li><li>避免指責或批評</li></ul></div>',
                'date' => '2024-01-18',
                'tags' => ['親子關係', '溝通技巧', '家庭'],
                'author' => '李心理師',
                'related_articles' => [1, 4]
            ],
            3 => [
                'id' => 3,
                'title' => '走出情緒低潮的方法',
                'content' => '<div class="article-section"><h2>理解情緒低潮</h2><p>每個人都可能經歷情緒低潮，關鍵在於如何正確面對和處理。讓我們一起探討一些實用的調適方法。</p></div><div class="article-section"><h2>接納與覺察</h2><p>接納自己的情緒是很重要的，不要否認或壓抑負面情緒。</p></div><div class="article-section"><h2>調適方法</h2><ul><li>保持規律的作息</li><li>培養興趣愛好</li><li>參與社交活動</li><li>適當的運動</li></ul><p>這些都能幫助我們找到生活的平衡。</p></div>',
                'date' => '2024-01-15',
                'tags' => ['情緒管理', '心理健康', '自我成長'],
                'author' => '王心理師',
                'related_articles' => [1, 4]
            ],
            4 => [
                'id' => 4,
                'title' => '職場壓力調適指南',
                'content' => '<div class="article-section"><h2>職場壓力的挑戰</h2><p>現代職場中的壓力與日俱增，如何在工作與生活之間取得平衡？本文提供一些實用的壓力管理技巧。</p></div><div class="article-section"><h2>壓力管理策略</h2><ul><li>設定明確的工作界限</li><li>建立有效的時間管理系統</li><li>培養正向的工作心態</li><li>建立良好的同事關係</li></ul></div><div class="article-section"><h2>自我照顧</h2><p>適時的放鬆和休息是必要的，避免過度勞累。如果感到壓力過大，不要害怕尋求協助。</p></div>',
                'date' => '2024-01-12',
                'tags' => ['職場健康', '壓力管理', '工作與生活平衡'],
                'author' => '陳心理師',
                'related_articles' => [1, 3]
            ]
        ];

        $article = $articles[$id] ?? abort(404);
        return view('articles.show', compact('article'));
    }
}
