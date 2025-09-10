<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'suggestions';

    // The attributes that are mass assignable.
    protected $fillable = [
        'department_id',
        'name',
        'father_name',
        'ward_number',
        'mobile_number',
        'message',
        'otp',
        'is_verify',
        'unique_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    //  // Automatically generate unique_id on creating
    //  protected static function boot()
    //  {
    //      parent::boot();
 
    //      static::creating(function ($model) {
    //          $model->unique_id = self::generateUniqueId();
    //      });
    //  }
 
    //  // Function to generate a 10-character unique ID
    //  public static function generateUniqueId()
    //  {
    //      return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
    //  }
    
}
