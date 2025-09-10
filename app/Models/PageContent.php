<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    protected $table = "page_contents";
    protected $fillable = ['module','title', 'description'];

    // Set default values for timestamps
    public $timestamps = true;
}
