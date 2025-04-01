<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::whereNull('deleted_at')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $validated['image'] = $path;
        }

        $validated['published_at'] = date('Y-m-d H:i', strtotime($validated['published_at']));
        $validated['status'] = $request->has('status');

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', '專欄已成功建立');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // 刪除舊圖片
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $path = $request->file('image')->store('articles', 'public');
            $validated['image'] = $path;
        }

        $validated['published_at'] = date('Y-m-d H:i', strtotime($validated['published_at']));
        $validated['status'] = $request->has('status');

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', '專欄已成功更新');
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