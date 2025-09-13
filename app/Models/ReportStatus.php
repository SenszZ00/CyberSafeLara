<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportStatus extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
    
    // 🔹 Relationship with Report
    public function reports() {
        return $this->hasMany(Report::class, 'report_status_id');
    }
}
