<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject',
        'content',
    ];

    // 🔹 Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
