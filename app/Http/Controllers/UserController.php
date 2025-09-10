<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::with('role')->where('is_admin', '<>', 1)->get();
        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.form', compact('roles'));
    }

    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'role_id' => $request->role_id,
    //     ]);

    //     return redirect()->route('users.index');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => $request->id ? 'nullable|min:8' : 'required|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data = $request->only(['name', 'email', 'role_id']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        User::updateOrCreate(['id' => $request->id], $data);

        return redirect()->route('users.index')->with('success', 'User saved successfully.');
    }
    
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.form', compact('user', 'roles'));
    }

    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     if ($request->password) {
    //         $user->password = bcrypt($request->password);
    //     }
    //     $user->role_id = $request->role_id;
    //     $user->save();

    //     return redirect()->route('users.index');
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
    
        $user->role_id = $request->role_id;
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

