<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    private $courses = [
        [
            'id' => 1,
            'title' => '壓力管理工作坊',
            'datetime' => '2024-02-01 14:00 ~ 16:00',
            'description' => '學習實用的壓力管理技巧，建立健康的生活方式。透過專業講師的指導，學習如何識別壓力來源、掌握放鬆技巧，以及建立個人的壓力管理策略。',
            'image' => '/images/environment/3.jpg',
            'location' => '台北市信義區信義路五段',
            'price' => 1500,
            'content' => '<p class="mb-4">在這個快節奏的現代社會中，壓力已成為每個人生活中不可避免的一部分。本工作坊將帶領您：</p>
                        <ul class="list-disc list-inside mb-4 space-y-2">
                            <li>了解壓力的來源與影響</li>
                            <li>學習實用的壓力管理技巧</li>
                            <li>建立個人化的壓力調適策略</li>
                            <li>練習正念減壓方法</li>
                        </ul>'
        ],
        [
            'id' => 2,
            'title' => '親子溝通技巧講座',
            'datetime' => '2024-02-15 19:00 ~ 21:00',
            'description' => '探討有效的親子溝通方式，建立良好的家庭關係。課程將分享實用的溝通技巧，幫助父母更好地理解孩子的需求，創造和諧的親子互動。',
            'image' => '/images/environment/4.jpg',
            'location' => '台北市信義區信義路五段',
            'price' => 1500,
            'content' => '<p class="mb-4">良好的親子溝通是建立健康家庭關係的基石。本講座將幫助您：</p>
                        <ul class="list-disc list-inside mb-4 space-y-2">
                            <li>了解孩子的心理發展階段</li>
                            <li>掌握有效的溝通技巧</li>
                            <li>學習處理衝突的方法</li>
                            <li>建立互信與理解的關係</li>
                        </ul>'
        ]
    ];

    public function index(Request $request)
    {
        $page = $request->page;
        $perPage = 1;
        $paginator = new LengthAwarePaginator($this->courses, count($this->courses), $perPage, $page, [
            'path' => route('courses.index'),
        ]);
        return view('courses.index', ['courses' => $paginator]);
    }

    public function show($id)
    {
        // 假資料
        $course = [
            'id' => $id,
            'title' => '壓力管理工作坊',
            'date' => '2024-02-01 14:00 ~ 16:00',
            'location' => '台北市信義區信義路五段',
            'price' => 1500,
            'image' => '/images/environment/3.jpg',
            'schedule' => [
                [
                    'time' => '14:00-14:30',
                    'content' => '破冰活動與壓力評估'
                ],
                [
                    'time' => '14:30-15:00',
                    'content' => '壓力理論與影響介紹'
                ],
                [
                    'time' => '15:00-15:30',
                    'content' => '壓力管理技巧實作'
                ],
                [
                    'time' => '15:30-16:00',
                    'content' => '正念減壓練習與總結'
                ]
            ],
            'description' => '
                <p class="mb-4">在這個快節奏的現代社會中，壓力已成為每個人生活中不可避免的一部分。本工作坊將帶領您：</p>
                <ul class="list-disc list-inside mb-4 space-y-2">
                    <li>了解壓力的來源與影響</li>
                    <li>學習實用的壓力管理技巧</li>
                    <li>建立個人化的壓力調適策略</li>
                    <li>練習正念減壓方法</li>
                    <li>分享與交流壓力管理經驗</li>
                </ul>
                <p>透過專業講師的引導，結合理論與實務操作，幫助您建立更健康的生活方式。</p>
            ',
            'registration_info' => [
                'deadline' => '2024-01-25',
                'max_participants' => 20,
                'remaining_slots' => 8,
                'notes' => [
                    '請提前 10 分鐘報到',
                    '現場提供講義及文具',
                    '建議穿著輕便服裝',
                    '如需取消請提前 3 天告知'
                ]
            ],
            'team_member_id' => 1,
            'team_member' => [
                'id' => 1,
                'name' => '王曉明',
                'title' => '資深諮商心理師',
                'image' => '/images/teams/S__91521028.webp',
                'specialties' => [
                    '壓力管理',
                    '情緒管理',
                    '人際關係',
                    '職場適應'
                ]
            ]
        ];

        return view('courses.show', compact('course'));
    }
}
