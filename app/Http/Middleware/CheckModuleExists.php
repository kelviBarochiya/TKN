<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleExists
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get the controller name from the route action
        $action = $request->route()->getActionName();
        
        // Only process non-dashboard routes
        if ($request->route()->getName() === 'dashboard') {
            return $next($request);
        }

        // Extract the controller name and derive the module name
        if (strpos($action, '@') !== false) {
            [$controller] = explode('@', class_basename($action));
            $moduleName = str_replace('Controller', '', $controller);

            // Step 1: Check if the module exists, if not, create it
            $module = Module::firstOrCreate(['name' => $moduleName]);

            // Step 2: Define permissions for this module
            $permissions = [
                "{$moduleName}-list",
                "{$moduleName}-create",
                "{$moduleName}-edit",
                "{$moduleName}-delete",
            ];

            // Step 3: Create permissions if they don't exist
            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }

            // Step 4: Check if the user is admin (is_admin = 1)
            $user = $request->user();
            if ($user && $user->is_admin) {
                // Automatically assign permissions to the admin user
                $user->syncPermissions(Permission::all());
            }
        }

        return $next($request);
    }
}

