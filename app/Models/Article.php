<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> ..*/
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'article_status_id',
    ];

    // 🔹 Relationship with User (Author)
    public function status() {
        return $this->belongsTo(ArticleStatus::class, 'article_status_id');
    }

    // 🔹 Relationship with User (Author)
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
