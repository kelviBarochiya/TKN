<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';

    protected $fillable = [
        'address1', 'address2', 'address3', 
        'mobile_number1', 'mobile_number2', 'mobile_number3',
        'email1', 'email2', 'email3'
    ];
}
