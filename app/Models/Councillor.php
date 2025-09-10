<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Councillor extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipality_name',
        'ward_number',
        'member_name',
        'father_husband_name',
        'address',
        'designation',
        'mobile_number',
    ];
}
