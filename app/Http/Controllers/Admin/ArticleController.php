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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'status' => 'boolean',
            'tags' => 'nullable',
            'team_member_id' => 'required|exists:team_members,_id',
            'lazy_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'existing_lazy_images' => 'nullable|array',
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

        // 處理懶人包圖片
        $lazyImages = [];
        
        // 處理現有的圖片順序
        if ($request->has('existing_lazy_images')) {
            $lazyImages = $request->input('existing_lazy_images');
        }

        // 處理新上傳的圖片
        if ($request->hasFile('lazy_images')) {
            foreach ($request->file('lazy_images') as $image) {
                $path = $image->store('articles/lazy-images', 'public');
                $lazyImages[] = $path;
            }
        }

        // 確保 lazy_images 不為 null
        $validated['lazy_images'] = $lazyImages ?: [];

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'status' => 'boolean',
            'tags' => 'nullable',
            'team_member_id' => 'required|exists:team_members,_id',
            'lazy_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'existing_lazy_images' => 'nullable|array',
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

        // 處理懶人包圖片
        $lazyImages = [];
        
        // 處理現有的圖片順序
        if ($request->has('existing_lazy_images')) {
            $lazyImages = $request->input('existing_lazy_images');
        }

        // 處理新上傳的圖片
        if ($request->hasFile('lazy_images')) {
            foreach ($request->file('lazy_images') as $image) {
                $path = $image->store('articles/lazy-images', 'public');
                $lazyImages[] = $path;
            }
        }

        // 刪除被移除的圖片
        if ($article->lazy_images) {
            foreach ($article->lazy_images as $oldImage) {
                if (!in_array($oldImage, $lazyImages)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        }

        // 確保 lazy_images 不為 null
        $validated['lazy_images'] = $lazyImages ?: [];

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
