<?php

namespace App\Providers;

use Config;
use App\Models\User;
use App\Models\Module;
use App\Models\MailSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     // Reset permission cache
    //     Artisan::call('permission:cache-reset');

    //     // Step 1: Create or fetch permissions for each module in the 'modules' table
    //     $modules = Module::pluck('name')->toArray();
    //     foreach ($modules as $module) {
    //         $permissions = [
    //             "{$module}-list",
    //             "{$module}-create",
    //             "{$module}-edit",
    //             "{$module}-delete",
    //         ];

    //         // Ensure each permission exists
    //         foreach ($permissions as $permission) {
    //             Permission::firstOrCreate(['name' => $permission]);
    //         }
    //     }

    //     // Step 2: Assign all permissions to admin users (is_admin = 1)
    //     $allPermissions = Permission::all();
    //     $adminUsers = User::where('is_admin', 1)->get();

    //     foreach ($adminUsers as $admin) {
    //         $admin->syncPermissions($allPermissions);
    //     }
    // }
    
}
