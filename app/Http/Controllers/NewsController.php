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
                'content' => '
                    <article>
                        <p>為迎接新的一年，本所推出多項優惠方案，希望能幫助更多需要心理支持的朋友。</p>
                        
                        <h2>優惠方案內容</h2>
                        <section>
                            <div>
                                <h3>首次諮商體驗價</h3>
                                <p>原價 NT$ 2,000</p>
                                <p>優惠價 NT$ 1,500</p>
                                <small>限首次預約者</small>
                            </div>
                            <div>
                                <h3>定期諮商套裝優惠</h3>
                                <p>原價 NT$ 8,000</p>
                                <p>優惠價 NT$ 6,000</p>
                                <small>4次諮商套裝</small>
                            </div>
                            <div>
                                <h3>團體諮商特別價</h3>
                                <p>原價 NT$ 1,500/次</p>
                                <p>優惠價 NT$ 1,200/次</p>
                                <small>8-12人團體</small>
                            </div>
                        </section>

                        <h2>活動期間</h2>
                        <p>2024年1月15日至2024年3月15日</p>

                        <h2>注意事項</h2>
                        <ul>
                            <li>優惠方案不可與其他優惠同時使用</li>
                            <li>定期諮商套裝需在活動期間內使用完畢</li>
                            <li>團體諮商需提前一週預約</li>
                            <li>本優惠方案最終解釋權歸本所所有</li>
                        </ul>

                        <footer>
                            <p>歡迎有需要的朋友把握機會，讓我們一起展開心靈成長之旅。</p>
                            <p>預約專線：(02) 1234-5678</p>
                            <p>電子郵件：info@holduandme.com</p>
                        </footer>
                    </article>
                '
            ],
            2 => [
                'id' => 2,
                'title' => '心理健康講座系列活動',
                'date' => '2024-01-10',
                'image' => '/images/environment/2.jpg',
                'content' => '
                    <article>
                        <p>每月固定舉辦的心理健康講座，邀請您一同探索心靈成長之路。</p>
                        <h2>本月主題</h2>
                        <section>
                            <div>
                                <h3>情緒管理與壓力調適</h3>
                                <p>學習如何識別與管理情緒，建立有效的壓力調適策略。透過認知行為療法的技巧，幫助您更好地應對生活中的壓力源。</p>
                            </div>
                            <div>
                                <h3>人際關係的經營</h3>
                                <p>探索人際互動模式，提升溝通技巧與關係品質。學習建立健康的界限，增進親密關係的連結與互信。</p>
                            </div>
                            <div>
                                <h3>自我認識與成長</h3>
                                <p>透過自我探索，了解個人特質與生命價值。運用正向心理學的觀點，發掘自我優勢，建立正向的生活態度。</p>
                            </div>
                        </section>

                        <h2>活動資訊</h2>
                        <section>
                            <p>時間：每週六下午2:00-4:00</p>
                            <p>地點：好家在心理諮商所會議室</p>
                            <p>名額：每場次限20人</p>
                        </section>

                        <footer>
                            <p>名額有限，請提前報名預約。</p>
                            <p>預約專線：(02) 1234-5678</p>
                            <p>電子郵件：info@holduandme.com</p>
                        </footer>
                    </article>
                '
            ]
        ];

        if (!isset($news[$newsId])) {
            abort(404);
        }

        return view('news.show', ['news' => $news[$newsId]]);
    }
}
