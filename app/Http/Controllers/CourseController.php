<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = [
            [
                'id' => 1,
                'title' => '壓力管理工作坊',
                'datetime' => '2024-02-01 14:00 ~ 16:00',
                'description' => '學習實用的壓力管理技巧，建立健康的生活方式。透過專業講師的指導，學習如何識別壓力來源、掌握放鬆技巧，以及建立個人的壓力管理策略。',
                'image' => '/images/environment/3.jpg'
            ],
            [
                'id' => 2,
                'title' => '親子溝通技巧講座',
                'datetime' => '2024-02-15 19:00 ~ 21:00',
                'description' => '探討有效的親子溝通方式，建立良好的家庭關係。課程將分享實用的溝通技巧，幫助父母更好地理解孩子的需求，創造和諧的親子互動。',
                'image' => '/images/environment/4.jpg'
            ],
            [
                'id' => 3,
                'title' => '情緒覺察與表達工作坊',
                'datetime' => '2024-03-01 14:00 ~ 17:00',
                'description' => '學習辨識並健康地表達情緒，提升情緒智商。透過互動式練習，學習情緒覺察技巧，以及如何用建設性的方式表達感受。',
                'image' => '/images/environment/1.jpg'
            ],
            [
                'id' => 4,
                'title' => '正念減壓課程',
                'datetime' => '2024-03-15 19:00 ~ 21:00',
                'description' => '透過正念練習，學習如何在日常生活中保持專注和平靜。課程將介紹基礎的正念概念和技巧，幫助參與者培養正念習慣。',
                'image' => '/images/environment/2.jpg'
            ]
        ];

        return view('courses.index', compact('courses'));
    }
}