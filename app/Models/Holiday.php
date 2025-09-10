<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $table = 'holiday_list';

    // Define the fields that are mass assignable
    protected $fillable = [
        'date',
        'start_date',
        'end_date',
        'day',
        'event_name',
        'holiday_type', // Add holiday_type field
        'days',
    ];
}
