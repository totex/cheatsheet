<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleBlock extends Model
{
    protected $fillable = ['article_id', 'title', 'type', 'content', 'sort_order'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
