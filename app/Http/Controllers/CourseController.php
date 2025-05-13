<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::with('teamMember')
            ->orderBy('start_date', 'desc')
            ->paginate(30);

        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        // 載入關聯的講師資料
        $course->load('teamMember');

        return view('courses.show', compact('course'));
    }
}
