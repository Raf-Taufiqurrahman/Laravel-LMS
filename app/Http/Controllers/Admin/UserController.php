<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all users with roles, search and paginate
        $users = User::with('roles')->when(request()->q, function($search){
            $search = $search->where('name', 'like', '%'.request()->q.'%');
        })->paginate(10);

        // get all roles
        $roles = Role::get();

        // return view
        return view('admin.user.index', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // update roles for user
        $user->syncRoles($request->role);

        // return back with toastr
        return back()->with('toast_success', 'User roles updated successfully');
    }
}
