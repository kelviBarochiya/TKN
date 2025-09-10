<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;

    protected $table = 'image_gallery';
    protected $fillable = [
        'event_name',
        'event_description',
        'image_path',
    ];

    protected $casts = [
        'images' => 'array', // Automatically handle JSON for images
    ];
}
