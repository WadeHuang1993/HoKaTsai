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

    public function create()
    {
        $teamMembers = TeamMember::all();
        return view('admin.articles.create', compact( 'teamMembers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'tags' => 'nullable',
            'team_member_id' => 'required|exists:team_members,_id',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $validated['image'] = $path;
        }

        $validated['status'] = $request->has('status');
        $validated['team_member_id'] = $request->input('team_member_id');

        // 處理多重標籤
        $tags = $request->input('tags', '');
        $validated['tags'] = explode(',', $tags);

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', '專欄文章已成功建立');
    }

    public function edit(Article $article)
    {
        $teamMembers = TeamMember::all();
        return view('admin.articles.edit', compact('article', 'teamMembers'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
            'tags' => 'nullable',
            'team_member_id' => 'required|exists:team_members,_id',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $validated['status'] = $request->has('status');
        $validated['team_member_id'] = $request->input('team_member_id');

        // 處理多重標籤
        $tags = $request->input('tags', '');
        $validated['tags'] = explode(',', $tags);

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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image',
        ]);

        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('articles', 'public');
            $url = asset('storage/' . $path);
            return response()->json(['url' => $url]);
        }
        return response()->json(['error' => ['message' => '上傳失敗']], 400);
    }
}
