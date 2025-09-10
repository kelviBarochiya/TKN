<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeOfficer extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_image', 'name', 'designation', 'email', 'address', 'phone_number'
    ];
}
