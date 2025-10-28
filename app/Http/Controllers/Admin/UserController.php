<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index',[
            'users' => User::paginate(config('khc.pagination')),
        ]);
    }

    public function create()
    {
        return view('admin.user.create',[
            'roles' => Role::pluck('display_name','id'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', new Xss],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['nullable','array'],
            'roles.*' => ['exists:roles,id'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        $user->syncRoles($validated['roles']);
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user,
            'roles' => Role::pluck('display_name','id'),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', new Xss],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'roles' => ['nullable','array'],
            'roles.*' => ['exists:roles,id'],
        ]);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();
        $user->syncRoles($validated['roles']);
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    
}
