<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowWeDo extends Model
{
    use HasFactory;

    protected $table = 'how_we_do';

    protected $fillable = [
        'title',
        'description',
        'our_vision',
        'our_mission',
        'what_sets_us_apart',
        'image',
    ];
}
