<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'authorized_person_name',
        'email',
        'phone_number',
        'status'
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class); // In case you want to get complaints related to a department
    }
}
