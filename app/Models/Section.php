<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'sort_order',
    ];
    public function articles()
    {
        return $this->hasMany(Article::class)->orderBy('sort_order');
    }
}
