<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['complaint_id','body','check_status_id','is_admin','parent_id'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    
    public function checkstatus()
    {
        return $this->belongsTo(CheckStatus::class,'check_status_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'check_status_id'); // Adjust the foreign key if needed
    }
    
}
