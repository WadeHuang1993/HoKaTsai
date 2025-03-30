<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        // 目前使用靜態資料，之後可以從資料庫獲取
        $newsList = [
            [
                'id' => 1,
                'title' => '新年度諮商優惠方案開跑',
                'date' => '2024-01-15',
                'image' => '/images/environment/1.jpg',
                'content' => '為迎接新的一年，本所推出多項優惠方案，希望能幫助更多需要心理支持的朋友。'
            ],
            [
                'id' => 2,
                'title' => '心理健康講座系列活動',
                'date' => '2024-01-10',
                'image' => '/images/environment/2.jpg',
                'content' => '每月固定舉辦的心理健康講座，邀請您一同探索心靈成長之路。'
            ]
        ];

        $paginator = new LengthAwarePaginator($newsList, count($newsList), 1, $page, [
            'path' => route('news.index'),
        ]);
        return view('news.index', ['newsList' => $newsList, 'paginator' => $paginator]);
    }

    public function show($newsId)
    {
        // 這裡之後可以從資料庫獲取新聞資料
        // 目前先使用靜態資料做示範
        $news = [
            1 => [
                'id' => 1,
                'title' => '新年度諮商優惠方案開跑',
                'date' => '2024-01-15',
                'image' => '/images/environment/1.jpg',
                'content' => "為迎接新的一年，本所推出多項優惠方案，希望能幫助更多需要心理支持的朋友。\n\n優惠方案包括：\n1. 首次諮商體驗價\n2. 定期諮商套裝優惠\n3. 團體諮商特別價\n\n活動期間：2024年1月15日至2024年3月15日\n\n歡迎有需要的朋友把握機會，讓我們一起展開心靈成長之旅。"
            ],
            2 => [
                'id' => 2,
                'title' => '心理健康講座系列活動',
                'date' => '2024-01-10',
                'image' => '/images/environment/2.jpg',
                'content' => "每月固定舉辦的心理健康講座，邀請您一同探索心靈成長之路。\n\n本月主題：\n- 情緒管理與壓力調適\n- 人際關係的經營\n- 自我認識與成長\n\n時間：每週六下午2:00-4:00\n地點：好家在心理諮商所會議室\n\n名額有限，請提前報名預約。"
            ]
        ];

        if (!isset($news[$newsId])) {
            abort(404);
        }

        return view('news.show', ['news' => $news[$newsId]]);
    }
}
