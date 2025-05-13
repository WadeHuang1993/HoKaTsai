<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('_id', 'desc')
            ->paginate(10);

        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialties' => 'nullable|string',
            'work_experience' => 'nullable',
            'self_introduction' => 'nullable',
            'education' => 'nullable',
            'show_in_homepage' => 'string|nullable',
            'license_number' => 'nullable|max:255',
            'organization' => 'nullable|max:255'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('teams', 'public');
            $validated['image'] = $path;
        }

        // 處理陣列欄位
        $validated['specialties'] = array_filter(explode("\n", str_replace("\r", "", $validated['specialties'])));
        $validated['education'] = array_filter(explode("\n", str_replace("\r", "", $validated['education'] ?? '')));
        $validated['work_experience'] = array_filter(explode("\n", str_replace("\r", "", $validated['work_experience'] ?? '')));

        $validated['show_in_homepage'] = $request->has('show_in_homepage');

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', '團隊成員已成功建立');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialties' => 'nullable|string',
            'work_experience' => 'nullable',
            'self_introduction' => 'nullable',
            'education' => 'nullable',
            'show_in_homepage' => 'string|nullable',
            'license_number' => 'nullable|max:255',
            'organization' => 'nullable|max:255'
        ]);

        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $path = $request->file('image')->store('teams', 'public');
            $validated['image'] = $path;
        }

        // 處理陣列欄位
        $validated['specialties'] = array_filter(explode("\n", str_replace("\r", "", $validated['specialties'])));
        $validated['education'] = array_filter(explode("\n", str_replace("\r", "", $validated['education'] ?? '')));
        $validated['work_experience'] = array_filter(explode("\n", str_replace("\r", "", $validated['work_experience'] ?? '')));

        $validated['show_in_homepage'] = $request->has('show_in_homepage');

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', '團隊成員已成功更新');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', '團隊成員已成功刪除');
    }
}
