<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'section_id',
        'title',
        'sub_title',
        'slug',
        'content',
        'sort_order',
        'is_published',
        'is_public',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    // protected $with = ['section'];
    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // public function blocks()
    // {
    //     return $this->hasMany(ArticleBlock::class)->orderBy('sort_order');
    // }

    public function getBreadcrumbAttribute(): string
    {
        $section = explode(" ", $this->section->title);
        return $section[0] . ' > ' . $this->title;
    }
}
