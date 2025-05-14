<?php

namespace App\Services;

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
}
