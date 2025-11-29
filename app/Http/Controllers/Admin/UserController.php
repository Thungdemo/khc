<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user');
    }

    public function index()
    {
        return view('admin.user.index',[
            'users' => User::paginate(config('khc.pagination')),
        ]);
    }

    public function create()
    {
        return view('admin.user.create',[
            'roles' => Role::get(),
            'noticeCategories' => NoticeCategory::isParent()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', new Xss],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'roles' => ['required','array'],
            'roles.*' => ['exists:roles,name'],
            'notices_categories' => [Rule::requiredIf(in_array('notice', $request->input('roles', []))),'array'],
            'notices_categories.*' => ['exists:notice_categories,id'],
        ]);
        DB::beginTransaction();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->syncRoles($request->roles);
        $user->noticesCategories()->sync($request->notices_categories ?? []);
        DB::commit();
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user,
            'roles' => Role::get(),
            'noticeCategories' => NoticeCategory::isParent()->get(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', new Xss],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'roles' => ['nullable','array'],
            'roles.*' => ['exists:roles,name'],
            'notice_categories' => [Rule::requiredIf(in_array('notice', $request->input('roles', []))),'array'],
            'notice_categories.*' => ['exists:notice_categories,id'],
            
        ]);
        DB::beginTransaction();
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $user->syncRoles($request->roles ?? []);
        if (in_array('notice', $request->input('roles', []))) {
            $user->noticeCategories()->sync($request->notice_categories ?? []);
        } else {
            $user->noticeCategories()->detach();
        }
        DB::commit();
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }                
}
