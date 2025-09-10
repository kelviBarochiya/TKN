<?php

// app/Models/ServiceContact.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceContact extends Model
{
    protected $table = "service_contacts";
    protected $fillable = ['name', 'email', 'mobile', 'message','service_name'];
}
