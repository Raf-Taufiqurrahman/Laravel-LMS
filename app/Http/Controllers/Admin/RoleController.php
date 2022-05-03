<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all roles
        $roles = Role::with('permissions')->when(request()->q, function($search){
            $search = $search->where('name', 'like', '%'.request()->q.'%');
        })->paginate(5);

        // get all permission
        $permissions = Permission::get();

        // return view
        return view('admin.role.index', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        // create new role
        $role = Role::create([
            'name' => $request->name
        ]);

        // give role permissions
        $role->givePermissionTo($request->permissions);

        // return back with toastr
        return back()->with('toast_success', 'Role created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // validate the request
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        // update role
        $role->update(['name' => $request->name]);

        // sync permissions
        $role->syncPermissions($request->permissions);

        // return back with toastr
        return back()->with('toast_success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // delete role by id
        $role->delete();

        // return back with toastr
        return back()->with('toast_success', 'Role deleted successfully');
    }
}
