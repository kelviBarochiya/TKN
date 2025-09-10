<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'father_name',
        'ward_number',
        'mobile_number',
        'address',
        'messages',
        'complaint_id',
        'images',
        'is_verify'
    ];

    public function lifeCycle()
    {
        return $this->belongsTo(LifeCycle::class); // Assuming each complaint has one life cycle
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id'); // 'department_id' is the foreign key
    }
    // Define relationship with User model
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function checkstatus()
    {
        return $this->belongsTo(CheckStatus::class,'created_by');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'complaint_id');
    }
    
    public function nestedComments()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
}
