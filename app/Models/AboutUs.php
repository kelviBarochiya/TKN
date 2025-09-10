<?php

namespace App\Models;

use App\Models\AboutUsImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = ['title','description'];

    public function images()
    {
        return $this->hasMany(AboutUsImage::class);
    }
}
