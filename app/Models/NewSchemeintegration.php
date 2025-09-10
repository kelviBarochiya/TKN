<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewSchemeintegration extends Model
{
    use HasFactory;

    protected $table ='scheme_integration';
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
    ];
}
