<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'report_status_id',
    ];

    // 🔹 Relationship with ReportStatus
    public function status()
    {
        return $this->belongsTo(ReportStatus::class, 'report_status_id');
    }

    // 🔹 Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(ReportLog::class, 'report_id');
    }
}
