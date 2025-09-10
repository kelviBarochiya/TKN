<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use App\Helpers\ModuleHelper;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.list', compact('roles'));
    }

    // Role create karte waqt, modules ko display karna
    public function create()
    {
        // Modules ko fetch kar rahe hain
        $modules = Module::all();
        return view('admin.roles.form', compact('modules'));
    }

    // Role store karte waqt, permissions ko assign karna
    // public function store(Request $request)
    // {

    //     // Validate incoming request
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'modules' => 'required|array',
    //     ]);

    //     // Store the role
    //     $role = Role::create([
    //         'name' => $request->name,
    //     ]);

    //     // Check if modules are provided and iterate over them
    //     if (!empty($request->modules)) {
    //         foreach ($request->modules as $moduleId => $permissions) {
    //             // Insert each permission record with role_id and module_id
    //             Permission::create([
    //                 'role_id' => $role->id,  // Make sure to include the role_id
    //                 'module_id' => $moduleId,
    //                 'list_permission' => isset($permissions['list']) && $permissions['list'] == 'on' ? 1 : 0,
    //                 'create_permission' => isset($permissions['create']) && $permissions['create'] == 'on' ? 1 : 0,
    //                 'edit_permission' => isset($permissions['edit']) && $permissions['edit'] == 'on' ? 1 : 0,
    //                 'delete_permission' => isset($permissions['delete']) && $permissions['delete'] == 'on' ? 1 : 0,
    //             ]);
    //         }
    //     }

    //     // Return a success message or redirect as needed
    //     return redirect()->route('roles.index')->with('success', 'Role and permissions created successfully.');
    // }
    // Role store karte waqt, permissions ko assign karna
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'modules' => 'required|array',
        ]);

        // Store the role
        $role = Role::create([
            'name' => $request->name,
        ]);

        // Check if modules are provided and iterate over them
        if (!empty($request->modules)) {
            foreach ($request->modules as $moduleId => $permissions) {
                // Insert each permission record with role_id and module_id
                Permission::create([
                    'role_id' => $role->id,  // Include the role_id
                    'module_id' => $moduleId,
                    'list_permission' => isset($permissions['list']) ? 1 : 0,
                    'create_permission' => isset($permissions['create']) ? 1 : 0,
                    'edit_permission' => isset($permissions['edit']) ? 1 : 0,
                    'delete_permission' => isset($permissions['delete']) ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('roles.index')->with('success', 'Role and permissions created successfully.');
    }




    // Role edit karte waqt, existing permissions ko update karna
    public function edit($id)
    {
        // Role ko fetch kar rahe hain
        $role = Role::findOrFail($id);

        // Modules ko fetch kar rahe hain
        $modules = Module::all();

        // Permissions ko fetch kar rahe hain
        $permissions = Permission::where('role_id', $id)->get()->keyBy('module_id');

        return view('admin.roles.form', compact('role', 'modules', 'permissions'));
    }

    // Role update karte waqt, permissions ko save karna
    // public function update(Request $request, $id)
    // {
    //     // Role को update करें
    //     $role = Role::findOrFail($id);
    //     $role->update(['name' => $request->name]);

    //     // Existing permissions को delete करें
    //     Permission::where('role_id', $id)->delete();

    //     // नई permissions को store करें
    //     if (!empty($request->permissions)) {
    //         foreach ($request->permissions as $moduleId => $permissions) {
    //             Permission::create([
    //                 'role_id' => $role->id,
    //                 'module_id' => $moduleId,
    //                 'list_permission' => isset($permissions['list']) ? 1 : 0,
    //                 'create_permission' => isset($permissions['create']) ? 1 : 0,
    //                 'edit_permission' => isset($permissions['edit']) ? 1 : 0,
    //                 'delete_permission' => isset($permissions['delete']) ? 1 : 0,
    //             ]);
    //         }
    //     }

    //     return redirect()->route('roles.index')->with('success', 'Role and permissions updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        // Update the role name
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);

        // Delete old permissions
        Permission::where('role_id', $id)->delete();

        // Store new permissions
        if (!empty($request->modules)) {
            foreach ($request->modules as $moduleId => $permissions) {
                Permission::create([
                    'role_id' => $role->id,
                    'module_id' => $moduleId,
                    'list_permission' => isset($permissions['list']) ? 1 : 0,
                    'create_permission' => isset($permissions['create']) ? 1 : 0,
                    'edit_permission' => isset($permissions['edit']) ? 1 : 0,
                    'delete_permission' => isset($permissions['delete']) ? 1 : 0,
                ]);
            }
        }

        return redirect()->route('roles.index')->with('success', 'Role and permissions updated successfully.');
    }



    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // First, delete related permissions
        Permission::where('role_id', $id)->delete();

        // Now, delete the role
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role and permissions deleted successfully.');
    }
}
