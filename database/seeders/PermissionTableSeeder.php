<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'lifecycle-list',
            'lifecycle-create',
            'lifecycle-edit',
            'lifecycle-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
         ];
         
 
      
 
         foreach ($permissions as $permission) {
 
              Permission::create(['name' => $permission]);
 
         }
 
    }
}
