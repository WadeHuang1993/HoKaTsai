<?php

namespace App\Services;

use App\Models\News;
use App\Models\Course;
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
            'title' => '好家在心理諮商所｜台南專業心理健康服務',
            'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。我們擁有專業的心理師團隊，為您提供最適合的心理健康服務。位於台南市中西區，提供安全、專業的心理諮商環境。',
            'keywords' => '台南心理諮商,心理諮商所,心理健康,心理師,諮商所,心理治療,心理輔導,台南心理諮商所',
            'og' => [
                'title' => '好家在心理諮商所｜台南專業心理健康服務',
                'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。我們擁有專業的心理師團隊，為您提供最適合的心理健康服務。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '好家在心理諮商所｜台南專業心理健康服務',
                'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'LocalBusiness',
                'name' => '好家在心理諮商所',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'description' => '好家在心理諮商所提供專業溫暖的心理諮商服務，包含個別諮商、團體諮商等。我們擁有專業的心理師團隊，為您提供最適合的心理健康服務。',
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
            'title' => '心理課程與講座 - 好家在心理諮商所',
            'description' => '好家在心理諮商所提供專業的心理課程與講座，包含心理健康、情緒管理、人際關係等主題，由專業心理師帶領，幫助您提升心理素質與生活品質。',
            'keywords' => '心理課程,心理健康講座,情緒管理課程,人際關係講座,台南心理諮商所課程',
            'og' => [
                'title' => '心理課程與講座 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理課程與講座，包含心理健康、情緒管理、人際關係等主題，由專業心理師帶領，幫助您提升心理素質與生活品質。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
                'url' => url('/courses'),
                'type' => 'website',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => '心理課程與講座 - 好家在心理諮商所',
                'description' => '好家在心理諮商所提供專業的心理課程與講座，包含心理健康、情緒管理、人際關係等主題。',
                'image' => asset('images/environment/waiting_room_5.jpg'),
            ],
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => '好家在心理諮商所課程與講座',
                'description' => '好家在心理諮商所提供專業的心理課程與講座，包含心理健康、情緒管理、人際關係等主題。',
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
            'keywords' => '心理課程,' . $course->title . ',心理健康講座,台南心理諮商所課程',
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
}
