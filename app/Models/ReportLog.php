<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportLog extends Model
{
    /** @use HasFactory<\Database\Factories\ReportLogFactory> */
    use HasFactory;
    protected $fillable = [
        'report_id',
        'user_id',
        'action',
        'notes',
    ];
    
    // 🔹 Relationship with Report
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
   
    // 🔹 Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
