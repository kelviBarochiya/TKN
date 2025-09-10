<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $moduleName, $permissionName = null)
    {
        $role_id = Auth::user()->role_id;

        // Get module by name
        $module = \DB::table('modules')->where('name', $moduleName)->first();

        if ($module) {
            $moduleId = $module->id;
            $permissionColumns = ['list_permission', 'create_permission', 'edit_permission', 'delete_permission'];

            // Check if user has any permission for the module
            $permissions = \DB::table('permissions')
                ->where('module_id', $moduleId)
                ->where('role_id', $role_id)
                ->first();

            if ($permissions) {
                if ($permissionName) {
                    // Check specific permission
                    $permissionColumn = "{$permissionName}_permission";
                    if (!isset($permissions->$permissionColumn) || !$permissions->$permissionColumn) {
                        abort(403, 'Unauthorized access');
                    }
                } else {
                    // Check if any permission exists
                    foreach ($permissionColumns as $column) {
                        if ($permissions->$column) {
                            return $next($request);
                        }
                    }
                }
            }
        }

        abort(403, 'Unauthorized access');
    }
}
