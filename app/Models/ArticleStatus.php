<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleStatus extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // 🔹 Relationship with Article
    public function articles() {
        return $this->hasMany(Article::class, 'article_status_id');
    }
}
