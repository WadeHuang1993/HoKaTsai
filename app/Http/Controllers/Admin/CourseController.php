<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libraries\MongoDB;
use App\Models\Course;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('_id', 'desc')
            ->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $teamMembers = TeamMember::all();
        return view('admin.courses.create', compact('teamMembers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'team_member_id' => 'required|exists:team_members,_id',
            'schedule' => 'required|array',
            'schedule.*.time' => 'required|string',
            'schedule.*.content' => 'required|string',
            'max_participants' => 'required',
            'remaining_slots' => 'required',
            'price' => 'required|integer|min:0',
            'notes' => 'required|array',
            'notes.*' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $course = Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', '課程已成功建立');
    }

    public function edit(Course $course)
    {
        $teamMembers = TeamMember::all();
        return view('admin.courses.edit', compact('course', 'teamMembers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'team_member_id' => 'required|exists:team_members,_id',
            'schedule' => 'required|array',
            'schedule.*.time' => 'required|string',
            'schedule.*.content' => 'required|string',
            'max_participants' => 'required',
            'remaining_slots' => 'required',
            'price' => 'required|integer|min:0',
            'notes' => 'required|array',
            'notes.*' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // 刪除舊圖片
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', '課程已成功更新');
    }

    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', '課程已成功刪除');
    }
}
