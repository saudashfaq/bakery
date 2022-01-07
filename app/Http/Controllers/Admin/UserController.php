<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        $user_account = User::with('user_accounts')->where('id', $user->id)->first();

        return view('admin.user.profile', compact('user_account'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('admin.user.edit')->with('user', $user);

    }

    public function update(Request $request, $id)
    {
        $filename = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/user'), $filename);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $filename;
        $user->update();
        return redirect()->route('profile');

    }

    public function companyDetailEdit()
    {

//        $user_account = User_account::
    }

    public function users()
    {
        $users = User::where('parent_user_id', Auth::user()->id)->get();

        return view('admin.user.users', compact('users'));
    }

    public function createNewUser()
    {
        $roles = Role::pluck('name', 'name');
        $permissions = Permission::pluck('name', 'name');

        return view('admin.user.createnewuser', compact(['roles', 'permissions']));

    }

    public function storeNewUser(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        $input = $request->input();
//        $user = User::create($input->excipt('password' , 'role' , 'permission'));
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'parent_user_id' => Auth::user()->id,
            'user_account_id' => Auth::user()->user_account_id,
//            'password'=> $request->input('password')
            'password' => Hash::make($request->input('password'))
        ]);

        $user->assignRole($request->input('role'));
        $user->givePermissionTo($request->input('permission'));

        return redirect()->route('admin.users')->with('success', 'User Created Successfully');

    }


    public function editUser($id)
    {
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::pluck('name', 'name');
        $user = User::find($id);
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.user.edituser', compact(['roles', 'user', 'permissions']));

    }

    public function updateUser(Request $request, $id)
    {
//dd($request->input('role'));
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        $user->syncRoles([$request->input('role')]);
        $user->syncPermissions([$request->input('permission')]);

        return redirect()->route('admin.users')->with('success', 'User Updated Successfully');
    }

    public function deleteUser($id)
    {
       $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success' , 'User deleted  successfully');

    }
}
