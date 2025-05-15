<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Services\SeoService;

class CourseController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index(Request $request)
    {
        $courses = Course::with('teamMember')
            ->orderBy('start_date', 'desc')
            ->paginate(15);

        $seoData = $this->seoService->getCourseListSeoData($courses);

        return view('courses.index', compact('courses', 'seoData'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        // 載入關聯的講師資料
        $course->load('teamMember');

        $seoData = $this->seoService->getCourseDetailSeoData($course);

        return view('courses.show', compact('course', 'seoData'));
    }
}
