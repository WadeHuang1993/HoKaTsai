<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- 首頁 -->
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- 最新消息列表頁 -->
    <url>
        <loc>{{ url('/news') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- 最新消息內容頁 -->
    @foreach($news as $item)
    <url>
        <loc>{{ route('news.show', $item->_id) }}</loc>
        <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    <!-- 課程列表頁 -->
    <url>
        <loc>{{ url('/courses') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- 課程內容頁 -->
    @foreach($courses as $item)
    <url>
        <loc>{{ route('courses.show', $item->_id) }}</loc>
        <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    <!-- 專欄文章列表頁 -->
    <url>
        <loc>{{ url('/articles') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- 專欄文章內容頁 -->
    @foreach($articles as $item)
    <url>
        <loc>{{ route('articles.show', $item->_id) }}</loc>
        <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    <!-- 預約表單頁 -->
    <url>
        <loc>{{ url('/appointment') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>

    <!-- 團隊成員頁面 -->
    @foreach($teamMembers as $item)
    <url>
        <loc>{{ route('team.show', $item->_id) }}</loc>
        <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <!-- 常見問題頁 -->
    <url>
        <loc>{{ url('/faq') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
</urlset> 