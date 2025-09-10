<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckStatus extends Model
{
    use HasFactory;
    protected $table = 'check_status';
    protected $fillable = [
        'mobile_number',
        'is_verify'
    ];

}
