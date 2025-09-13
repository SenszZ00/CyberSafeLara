<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'user_type',
        'college_department_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔹 Relationship with CollegeDepartment
    public function collegeDepartment()
    {
        return $this->belongsTo(CollegeDepartment::class, 'college_department_id');
    }

    // 🔹 Relationship with Report
    public function reports()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    // 🔹 Relationship with Article
    public function articles() {
        return $this->hasMany(Article::class, 'user_id');
    }

    // 🔹 Relationship with ReportLog
    public function reportLogs() {
        return $this->hasMany(ReportLog::class, 'user_id');
    }
    
    // 🔹 Relationship with Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }
}
