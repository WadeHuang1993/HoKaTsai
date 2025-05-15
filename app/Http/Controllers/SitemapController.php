<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Course;
use App\Models\Article;
use App\Models\TeamMember;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $content = view('sitemap.index', [
            'news' => News::orderBy('created_at', 'desc')->get(),
            'courses' => Course::orderBy('created_at', 'desc')->get(),
            'articles' => Article::orderBy('created_at', 'desc')->get(),
            'teamMembers' => TeamMember::orderBy('order')->get(),
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
} 