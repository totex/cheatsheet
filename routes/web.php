<?php

use Illuminate\Support\Facades\Route;
use App\Models\Section;
use App\Models\Article;

Route::get('/', function () {
    $sections = Section::with('articles')
        ->orderBy('sort_order')
        ->get();
    return view('index', compact('sections'));
})->name('cheatsheets.index');


// TODO: Refactor to a controller
Route::get('/cheatsheets/{section:slug}/{article:slug}', function (
    Section $section,
    Article $article
) {
    abort_unless($article->section_id === $section->id, 404);

    return view('cheatsheets.show', [
        'sections' => Section::with('articles')->get(),
        'article' => $article->load('blocks'),
    ]);
})->name('cheatsheets.show');
