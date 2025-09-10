<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the admin user already exists
        $existingAdmin = User::where('email', 'admin@admin.com')->first();
        
        // If the admin user doesn't exist, create it
        if (!$existingAdmin) {
            $existingAdmin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@admin.com', // Replace with your admin email
                'password' => Hash::make('123456'), // Replace with a secure password
                'is_admin' => true // Admin user flag
            ]);
        }
    
        // Retrieve all permissions
        // $permissions = Permission::all();
    
        // Assign permissions to the existing or newly created admin user
        // $existingAdmin->syncPermissions($permissions);
    }
    
}
