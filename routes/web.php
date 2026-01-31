<?php

use Illuminate\Support\Facades\Route;
use App\Models\Section;
use App\Models\Article;

Route::get('/', function () {
    $sections = Section::with('articles')
        ->orderBy('sort_order')
        ->get();
    return view('index', compact('sections'));
});

Route::get('/docs/{section:slug}/{article:slug}', function (Section $section, Article $article) {
    abort_unless($article->section_id === $section->id, 404);
    return view('docs.article', compact('section', 'article'));
});
