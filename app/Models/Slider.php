<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    // protected $fillable = ['image1', 'image2', 'image3'];

    protected $fillable = ['image_path'];
}
