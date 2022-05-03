<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all permissions
        $permissions =  Permission::when(request()->q, function($search){
            $search = $search->where('name', 'like', '%'.request()->q.'%');
        })->paginate(5);

        // return view
        return view('admin.permission.index', compact('permissions'));
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
            'name' => 'required|unique:permissions'
        ]);

        // create new permission
        Permission::create([
            'name' => $request->name
        ]);

        // return back with toastr
        return back()->with('toast_success', 'Permission created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        // validate request
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id
        ]);

        // update permission
        $permission->update([
            'name' => $request->name
        ]);

        // return back with toastr
        return back()->with('toast_success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // delete permission
        $permission->delete();

        // return back with toastr
        return back()->with('toast_success', 'Permission deleted successfully');
    }
}
