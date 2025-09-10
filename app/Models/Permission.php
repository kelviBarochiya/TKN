<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'module_id',
        'list_permission',
        'create_permission',
        'edit_permission',
        'delete_permission',
        'created_at',
        'updated_at',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
