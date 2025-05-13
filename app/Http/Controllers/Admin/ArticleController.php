<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('_id', 'desc')
            ->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    private function getOftenTags()
    {
        return Article::raw(function($collection) {
            return $collection->aggregate([
                [
                    '$match' => [
                        'is_deleted' => ['$ne' => null],
                        'tag' => ['$exists' => true, '$ne' => null]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => '$tag',
                        'counts' => ['$sum' => 1]
                    ]
                ],
                [
                    '$project' => [
                        '_id' => 0,
                        'tag' => '$_id',
                        'counts' => 1
                    ]
                ],
                [
                    '$sort' => ['counts' => -1]
                ]
            ]);
        });
    }

    public function create()
    {
        $oftenTags = $this->getOftenTags();
        $teamMembers = TeamMember::all();
        return view('admin.articles.create', compact('oftenTags', 'teamMembers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'tag' => 'nullable|string|max:50',
            'team_member_id' => 'required|exists:team_members,_id',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $validated['image'] = $path;
        }

        $validated['status'] = $request->has('status');
        $validated['tag'] = $request->input('tag');
        $validated['team_member_id'] = $request->input('team_member_id');

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', '專欄文章已成功建立');
    }

    public function edit(Article $article)
    {
        $oftenTags = $this->getOftenTags();
        $teamMembers = TeamMember::all();
        return view('admin.articles.edit', compact('article', 'oftenTags', 'teamMembers'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'tag' => 'nullable|string|max:50',
            'team_member_id' => 'required|exists:team_members,_id',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $validated['status'] = $request->has('status');
        $validated['tag'] = $request->input('tag');
        $validated['team_member_id'] = $request->input('team_member_id');

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', '專欄文章已更新');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', '專欄已成功刪除');
    }
}
