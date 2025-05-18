<?php

namespace App\Services;

use App\Models\News;
use App\Models\Course;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class SeoService
{
    /**
     * 生成首頁的 SEO 資料
     *
     * @return array
     */
    public function getHomeSeoData(): array
    {
        return [
            'title' => '好家在心理諮商所｜台南專業心理諮商服務',
            'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。我們擁有專業的心理師團隊，為您提供最適合的心理諮商服務。位於台南市中西區，提供安全、專業的心理諮商環境。',
            'keywords' => '台南心理諮商,心理諮商所,心理健康,心理師,諮商所,心理治療,心理輔導,台南心理諮商所',
            'og' => [
                'title' => '好家在心理諮商所｜台南專業心理諮商服務',
                'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。我們擁有專業的心理師團隊，為您提供最適合的心理諮商服務。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '好家在心理諮商所｜台南專業心理諮商服務',
                'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'LocalBusiness',
                'name' => '好家在心理諮商所',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。我們擁有專業的心理師團隊，為您提供最適合的心理諮商服務。',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '友愛街237號',
                    'addressLocality' => '台南市',
                    'addressRegion' => '中西區',
                    'postalCode' => '700',
                    'addressCountry' => 'TW'
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => '22.9971',
                    'longitude' => '120.2047'
                ],
                'url' => url('/'),
                'telephone' => '+886-6-223-8050',
                'email' => 'hokatsaicounseling@gmail.com',
                'priceRange' => '$$$',
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                        'opens' => '09:00',
                        'closes' => '17:00'
                    ]
                ],
                'sameAs' => [
                    'https://www.instagram.com/hokatsaicounseling',
                    'https://www.facebook.com/profile.php?id=61573891754810'
                ],
                'hasPart' => [
                    [
                        '@type' => 'WebPage',
                        'name' => '最新消息',
                        'url' => route('news.index')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '團隊陣容',
                        'url' => url('/#team')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '諮商費用',
                        'url' => route('service-fee.index')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '諮商服務',
                        'url' => url('/#counseling-services')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '諮商專欄',
                        'url' => route('articles.index')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '課程講座',
                        'url' => route('courses.index')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '諮商Q&A',
                        'url' => route('faq.index')
                    ],
                    [
                        '@type' => 'WebPage',
                        'name' => '預約諮商',
                        'url' => route('appointment.form')
                    ]
                ]
            ]
        ];
    }

    /**
     * 生成最新消息列表頁的 SEO 資料
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $news
     * @return array
     */
    public function getNewsListSeoData($news): array
    {
        return [
            'title' => '最新消息 - 好家在心理諮商所',
            'description' => '好家在心理諮商所的最新消息與活動資訊，包含講座課程、工作坊、專業分享等心理健康相關活動。',
            'keywords' => '心理諮商所最新消息,心理諮商活動,心理健康講座,台南心理諮商所活動',
            'og' => [
                'title' => '最新消息 - 好家在心理諮商所',
                'description' => '好家在心理諮商所的最新消息與活動資訊，包含講座課程、工作坊、專業分享等心理健康相關活動。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/news'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '最新消息 - 好家在心理諮商所',
                'description' => '好家在心理諮商所的最新消息與活動資訊，包含講座課程、工作坊、專業分享等心理健康相關活動。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => '好家在心理諮商所最新消息',
                'description' => '好家在心理諮商所的最新消息與活動資訊，包含講座課程、工作坊、專業分享等心理健康相關活動。',
                'url' => url('/news'),
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'itemListElement' => $news->map(function ($item, $index) {
                        return [
                            '@type' => 'ListItem',
                            'position' => $index + 1,
                            'item' => [
                                '@type' => 'NewsArticle',
                                'headline' => $item->title,
                                'description' => strip_tags(str_replace('&nbsp;', ' ', $item->content)),
                                'datePublished' => $item->created_at->format('Y-m-d'),
                                'dateModified' => $item->updated_at->format('Y-m-d'),
                                'image' => $item->image ? Storage::url($item->image) : asset('images/environment/waiting_room_5.jpg'),
                                'url' => route('news.show', $item->_id),
                                'publisher' => [
                                    '@type' => 'Organization',
                                    'name' => '好家在心理諮商所',
                                    'logo' => [
                                        '@type' => 'ImageObject',
                                        'url' => asset('images/environment/waiting_room_5.jpg')
                                    ]
                                ]
                            ]
                        ];
                    })->toArray()
                ]
            ]
        ];
    }

    /**
     * 生成最新消息內容頁的 SEO 資料
     *
     * @param \App\Models\News $news
     * @return array
     */
    public function getNewsDetailSeoData(News $news): array
    {
        $description = strip_tags(str_replace('&nbsp;', ' ', $news->content));
        $description = mb_substr($description, 0, 160, 'UTF-8') . '...';

        return [
            'title' => $news->title . ' - 好家在心理諮商所',
            'description' => $description,
            'keywords' => '心理諮商所最新消息,' . $news->title . ',台南心理諮商所活動',
            'og' => [
                'title' => $news->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $news->image ? Storage::url($news->image) : asset('images/environment/waiting_room_5.jpg'),
                'url' => route('news.show', $news->_id),
                'type' => 'article',
                'article' => [
                    'published_time' => $news->created_at->format('Y-m-d'),
                    'modified_time' => $news->updated_at->format('Y-m-d'),
                    'author' => '好家在心理諮商所',
                    'section' => '最新消息',
                ]
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => $news->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $news->image ? Storage::url($news->image) : asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'NewsArticle',
                'headline' => $news->title,
                'description' => $description,
                'image' => $news->image ? Storage::url($news->image) : asset('images/environment/waiting_room_5.jpg'),
                'datePublished' => $news->created_at->format('Y-m-d'),
                'dateModified' => $news->updated_at->format('Y-m-d'),
                'author' => [
                    '@type' => 'Organization',
                    'name' => '好家在心理諮商所',
                    'url' => url('/')
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => '好家在心理諮商所',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('images/environment/waiting_room_5.jpg')
                    ]
                ],
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => route('news.show', $news->_id)
                ]
            ]
        ];
    }

    /**
     * 生成課程列表頁的 SEO 資料
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $courses
     * @return array
     */
    public function getCourseListSeoData($courses): array
    {
        return [
            'title' => '心理諮商課程與講座 - 好家在心理諮商所',
            'description' => '好家在心理諮商所提供專業的心理諮商課程與講座，包含心理健康、情緒管理、人際關係等主題，由專業心理師帶領，幫助您提升心理素質與生活品質。',
            'keywords' => '心理諮商課程,心理健康講座,情緒管理課程,人際關係講座,台南心理諮商所課程',
            'og' => [
                'title' => '心理諮商課程與講座 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理諮商課程與講座，包含心理健康、情緒管理、人際關係等主題，由專業心理師帶領，幫助您提升心理素質與生活品質。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/courses'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '心理諮商課程與講座 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理諮商課程與講座，包含心理健康、情緒管理、人際關係等主題。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => '好家在心理諮商所課程與講座',
                'description' => '好家在心理諮商所提供專業的心理諮商課程與講座，包含心理健康、情緒管理、人際關係等主題。',
                'url' => url('/courses'),
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'itemListElement' => $courses->map(function ($item, $index) {
                        return [
                            '@type' => 'ListItem',
                            'position' => $index + 1,
                            'item' => [
                                '@type' => 'Event',
                                'name' => $item->title,
                                'description' => strip_tags(str_replace('&nbsp;', ' ', $item->description)),
                                'startDate' => $item->start_date->format('Y-m-d'),
                                'endDate' => $item->end_date->format('Y-m-d'),
                                'image' => $item->image ? Storage::url($item->image) : asset('images/environment/waiting_room_5.jpg'),
                                'url' => route('courses.show', $item->_id),
                                'location' => [
                                    '@type' => 'Place',
                                    'name' => '好家在心理諮商所',
                                    'address' => [
                                        '@type' => 'PostalAddress',
                                        'streetAddress' => '友愛街237號',
                                        'addressLocality' => '台南市',
                                        'addressRegion' => '中西區',
                                        'postalCode' => '700',
                                        'addressCountry' => 'TW'
                                    ]
                                ],
                                'organizer' => [
                                    '@type' => 'Organization',
                                    'name' => '好家在心理諮商所',
                                    'url' => url('/')
                                ],
                                'offers' => [
                                    '@type' => 'Offer',
                                    'price' => $item->price,
                                    'priceCurrency' => 'TWD',
                                    'availability' => $item->status ? 'https://schema.org/InStock' : 'https://schema.org/SoldOut'
                                ]
                            ]
                        ];
                    })->toArray()
                ]
            ]
        ];
    }

    /**
     * 生成課程講座內容頁的 SEO 資料
     *
     * @param \App\Models\Course $course
     * @return array
     */
    public function getCourseDetailSeoData(Course $course): array
    {
        $description = strip_tags(str_replace('&nbsp;', ' ', $course->description));
        $description = mb_substr($description, 0, 160, 'UTF-8') . '...';

        return [
            'title' => $course->title . ' - 好家在心理諮商所',
            'description' => $description,
            'keywords' => '心理諮商課程,' . $course->title . ',心理健康講座,台南心理諮商所課程',
            'og' => [
                'title' => $course->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $course->image ? Storage::url($course->image) : asset('images/environment/waiting_room_5.jpg'),
                'url' => route('courses.show', $course->_id),
                'type' => 'article',
                'article' => [
                    'published_time' => $course->created_at->format('Y-m-d'),
                    'modified_time' => $course->updated_at->format('Y-m-d'),
                    'author' => $course->teamMember->name,
                    'section' => '講座課程',
                ]
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => $course->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $course->image ? Storage::url($course->image) : asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Event',
                'name' => $course->title,
                'description' => $description,
                'image' => $course->image ? Storage::url($course->image) : asset('images/environment/waiting_room_5.jpg'),
                'startDate' => $course->start_date->format('Y-m-d'),
                'endDate' => $course->end_date->format('Y-m-d'),
                'location' => [
                    '@type' => 'Place',
                    'name' => '好家在心理諮商所',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '友愛街237號',
                        'addressLocality' => '台南市',
                        'addressRegion' => '中西區',
                        'postalCode' => '700',
                        'addressCountry' => 'TW'
                    ]
                ],
                'organizer' => [
                    '@type' => 'Organization',
                    'name' => '好家在心理諮商所',
                    'url' => url('/')
                ],
                'performer' => [
                    '@type' => 'Person',
                    'name' => $course->teamMember->name,
                    'jobTitle' => $course->teamMember->title
                ],
                'offers' => [
                    '@type' => 'Offer',
                    'price' => $course->price,
                    'priceCurrency' => 'TWD',
                    'availability' => $course->status ? 'https://schema.org/InStock' : 'https://schema.org/SoldOut'
                ],
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => route('courses.show', $course->_id)
                ]
            ]
        ];
    }

    /**
     * 生成專欄文章列表頁的 SEO 資料
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $articles
     * @return array
     */
    public function getArticleListSeoData($articles): array
    {
        return [
            'title' => '心理諮商專欄 - 好家在心理諮商所',
            'description' => '好家在心理諮商所的心理諮商專欄，提供專業的心理健康知識、情緒管理技巧、人際關係建議等文章，由專業心理師撰寫，幫助您更了解自己，提升生活品質。',
            'keywords' => '心理諮商專欄,心理健康文章,情緒管理,人際關係,心理諮商,台南心理諮商所',
            'og' => [
                'title' => '心理諮商專欄 - 好家在心理諮商所',
                'description' => '好家在心理諮商所的心理諮商專欄，提供專業的心理健康知識、情緒管理技巧、人際關係建議等文章，由專業心理師撰寫。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/articles'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '心理諮商專欄 - 好家在心理諮商所',
                'description' => '好家在心理諮商所的心理諮商專欄，提供專業的心理健康知識、情緒管理技巧、人際關係建議等文章。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Blog',
                'name' => '好家在心理諮商所心理諮商專欄',
                'description' => '好家在心理諮商所的心理諮商專欄，提供專業的心理健康知識、情緒管理技巧、人際關係建議等文章。',
                'url' => url('/articles'),
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => '好家在心理諮商所',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('images/environment/waiting_room_5.jpg')
                    ]
                ],
                'blogPost' => $articles->map(function ($article) {
                    return [
                        '@type' => 'BlogPosting',
                        'headline' => $article->title,
                        'description' => strip_tags(str_replace('&nbsp;', ' ', $article->summary)),
                        'datePublished' => $article->created_at->format('Y-m-d'),
                        'dateModified' => $article->updated_at->format('Y-m-d'),
                        'image' => $article->image ? Storage::url($article->image) : asset('images/environment/waiting_room_5.jpg'),
                        'url' => route('articles.show', $article->_id),
                        'author' => [
                            '@type' => 'Person',
                            'name' => $article->teamMember->name,
                            'jobTitle' => $article->teamMember->title
                        ],
                        'publisher' => [
                            '@type' => 'Organization',
                            'name' => '好家在心理諮商所',
                            'logo' => [
                                '@type' => 'ImageObject',
                                'url' => asset('images/environment/waiting_room_5.jpg')
                            ]
                        ]
                    ];
                })->toArray()
            ]
        ];
    }

    /**
     * 生成專欄文章內容頁的 SEO 資料
     *
     * @param \App\Models\Article $article
     * @return array
     */
    public function getArticleDetailSeoData(Article $article): array
    {
        $description = strip_tags(str_replace('&nbsp;', ' ', $article->summary));
        $description = mb_substr($description, 0, 160, 'UTF-8') . '...';

        return [
            'title' => $article->title . ' - 好家在心理諮商所',
            'description' => $description,
            'keywords' => '心理諮商專欄,' . $article->title . ',心理健康文章,台南心理諮商所',
            'og' => [
                'title' => $article->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $article->image ? Storage::url($article->image) : asset('images/environment/waiting_room_5.jpg'),
                'url' => route('articles.show', $article->_id),
                'type' => 'article',
                'article' => [
                    'published_time' => $article->created_at->format('Y-m-d'),
                    'modified_time' => $article->updated_at->format('Y-m-d'),
                    'author' => $article->teamMember->name,
                    'section' => '心理諮商專欄',
                    'tag' => $article->tags
                ]
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => $article->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $article->image ? Storage::url($article->image) : asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                'headline' => $article->title,
                'description' => $description,
                'image' => $article->image ? Storage::url($article->image) : asset('images/environment/waiting_room_5.jpg'),
                'datePublished' => $article->created_at->format('Y-m-d'),
                'dateModified' => $article->updated_at->format('Y-m-d'),
                'author' => [
                    '@type' => 'Person',
                    'name' => $article->teamMember->name,
                    'jobTitle' => $article->teamMember->title,
                    'image' => $article->teamMember->image
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => '好家在心理諮商所',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('images/environment/waiting_room_5.jpg')
                    ]
                ],
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => route('articles.show', $article->_id)
                ],
                'keywords' => implode(', ', $article->tags)
            ]
        ];
    }

    /**
     * 生成預約表單頁面的 SEO 資料
     *
     * @return array
     */
    public function getAppointmentSeoData(): array
    {
        return [
            'title' => '心理諮商預約 - 好家在心理諮商所',
            'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。透過線上預約系統，您可以輕鬆選擇適合的時段與心理師，開始您的心理健康之旅。',
            'keywords' => '心理諮商預約,線上預約,個別諮商,伴侶諮商,台南心理諮商所',
            'og' => [
                'title' => '心理諮商預約 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。透過線上預約系統，您可以輕鬆選擇適合的時段與心理師。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/appointment'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '心理諮商預約 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
                'name' => '好家在心理諮商所預約系統',
                'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。',
                'url' => url('/appointment'),
                'mainEntity' => [
                    '@type' => 'Service',
                    'name' => '心理諮商服務',
                    'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => '好家在心理諮商所',
                        'address' => [
                            '@type' => 'PostalAddress',
                            'streetAddress' => '友愛街237號',
                            'addressLocality' => '台南市',
                            'addressRegion' => '中西區',
                            'postalCode' => '700',
                            'addressCountry' => 'TW'
                        ],
                        'telephone' => '+886-6-223-8050',
                        'email' => 'hokatsaicounseling@gmail.com'
                    ],
                    'areaServed' => [
                        '@type' => 'City',
                        'name' => '台南市'
                    ],
                    'hasOfferCatalog' => [
                        '@type' => 'OfferCatalog',
                        'name' => '諮商服務項目',
                        'itemListElement' => [
                            [
                                '@type' => 'Offer',
                                'itemOffered' => [
                                    '@type' => 'Service',
                                    'name' => '個別諮商',
                                    'description' => '透過一對一的諮商，在安全的環境下，心理師與您一起深入的探索自己、了解自己。'
                                ]
                            ],
                            [
                                '@type' => 'Offer',
                                'itemOffered' => [
                                    '@type' => 'Service',
                                    'name' => '兒童遊戲治療',
                                    'description' => '讓「遊戲」成為兒童的語言，「玩具」成為兒童的字彙，表達內心的感受，心理師藉此理解與評估兒童處境，並適時搭配家長諮詢，一同改善孩子面臨的難題。'
                                ]
                            ],
                            [
                                '@type' => 'Offer',
                                'itemOffered' => [
                                    '@type' => 'Service',
                                    'name' => '伴侶/婚姻諮商',
                                    'description' => '透過心理師的第三方合作，協助伴侶停下傷害關係的互動模式，並能看見彼此在關係中的滋養，創造好的互動模式。'
                                ]
                            ],
                            [
                                '@type' => 'Offer',
                                'itemOffered' => [
                                    '@type' => 'Service',
                                    'name' => '親子/家族諮商',
                                    'description' => '兩人以上的諮商方式，協助改善親子/家庭成員間的溝通方式、解決衝突、改善關係，創造新的連結方式，產生滿意的關係互動。'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * 生成諮商心理師內容頁的 SEO 資料
     *
     * @param \App\Models\TeamMember $member
     * @return array
     */
    public function getTeamMemberDetailSeoData($member): array
    {
        $description = strip_tags(str_replace('&nbsp;', ' ', $member->self_introduction));
        $description = mb_substr($description, 0, 160, 'UTF-8') . '...';

        return [
            'title' => $member->name . ' - ' . $member->title . ' - 好家在心理諮商所',
            'description' => $description,
            'keywords' => '心理諮商師,' . $member->name . ',' . $member->title . ',台南心理諮商所',
            'og' => [
                'title' => $member->name . ' - ' . $member->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $member->image ? Storage::url($member->image) : asset('images/environment/waiting_room_5.jpg'),
                'url' => route('team.show', $member->_id),
                'type' => 'profile',
                'profile' => [
                    'first_name' => $member->name,
                    'last_name' => '',
                    'username' => $member->name,
                    'gender' => 'female'
                ]
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => $member->name . ' - ' . $member->title . ' - 好家在心理諮商所',
                'description' => $description,
                'image' => $member->image ? Storage::url($member->image) : asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => $member->name,
                'jobTitle' => $member->title,
                'description' => $description,
                'image' => $member->image ? Storage::url($member->image) : asset('images/environment/waiting_room_5.jpg'),
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => '好家在心理諮商所',
                    'url' => url('/')
                ],
                'knowsAbout' => array_merge(
                    $member->specialties ?? [],
                    $member->specialized_approaches ?? []
                ),
                'award' => $member->professional_trainings ?? [],
                'alumniOf' => array_map(function($education) {
                    return [
                        '@type' => 'CollegeOrUniversity',
                        'name' => $education
                    ];
                }, $member->education ?? []),
                'url' => route('team.show', $member->_id),
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => route('team.show', $member->_id)
                ]
            ]
        ];
    }

    /**
     * 生成常見問題頁面的 SEO 資料
     *
     * @param \Illuminate\Database\Eloquent\Collection $faqs
     * @return array
     */
    public function getFaqSeoData($faqs): array
    {
        return [
            'title' => '常見問題 - 好家在心理諮商所',
            'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。這裡整理了常見的心理諮商相關問題，幫助您更了解心理諮商服務。',
            'keywords' => '心理諮商常見問題,心理諮商FAQ,心理諮商費用,心理諮商流程,台南心理諮商所',
            'og' => [
                'title' => '常見問題 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。這裡整理了常見的心理諮商相關問題，幫助您更了解心理諮商服務。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/faq'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '常見問題 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理諮商服務，包含個別諮商、伴侶諮商等。這裡整理了常見的心理諮商相關問題。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $faqs->map(function ($faq) {
                    return [
                        '@type' => 'Question',
                        'name' => $faq->question,
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => strip_tags(str_replace('&nbsp;', ' ', $faq->answer))
                        ]
                    ];
                })->toArray()
            ]
        ];
    }

    public function getServiceFeeSeoData($serviceFees)
    {
        $title = '收費標準 - 好家在心理諮商所';
        $description = '本頁提供好家在心理諮商所各項心理諮商服務的收費標準、服務內容與現金支付方式，協助您透明了解預約流程與費用。';
        $keywords = '心理諮商, 收費標準, 諮商費用, 台南心理師, 好家在心理諮商所';
        $url = url('/service-fee');
        $image = asset('images/environment/waiting_room_5.jpg');
        $offerList = [];
        foreach ($serviceFees as $fee) {
            $offerList[] = [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => $fee->title,
                    'description' => trim(($fee->subtitle ? $fee->subtitle . '，' : '') . ($fee->description ?? '')),
                ],
                'price' => $fee->price,
                'priceCurrency' => 'TWD',
            ];
        }
        return [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
            'og' => [
                'type' => 'website',
                'url' => $url,
                'title' => $title,
                'description' => $description,
                'image' => $image,
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => $title,
                'description' => $description,
                'image' => $image,
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => '諮商服務收費標準',
                'provider' => [
                    '@type' => 'LocalBusiness',
                    'name' => '好家在心理諮商所',
                    'image' => $image,
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '台南市中西區友愛街237號',
                        'addressLocality' => '台南市',
                        'addressRegion' => '台南市',
                        'postalCode' => '700',
                        'addressCountry' => 'TW',
                    ],
                    'telephone' => '(06)223-8050',
                    'url' => url('/'),
                ],
                'description' => $description,
                'areaServed' => '台南市',
                'serviceType' => '心理諮商',
                'url' => $url,
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name' => '諮商服務項目',
                    'itemListElement' => $offerList,
                ],
            ],
        ];
    }
}
