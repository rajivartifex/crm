<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class RoleController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('pages.roles.index',compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('pages.roles.create',compact('permission'));
    }

    public function store(Request $request)
    {
        if($request['ff']['role_id']){
            $this->validate($request, [
                'name' => 'required',
                'permission' => 'required',
            ]);

            $role = Role::find($request['ff']['role_id']);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));

        }else{
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
        }

        session()->flash('success', 'Role updated successfully!');
        session()->flash('title', 'Roles');

        return response()->json([
            'data' => $role
        ]);
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('pages.roles.create',compact('role','permission','rolePermissions'));
    }

    public function roles_delete(Request $request)
    {
        DB::table("roles")->where('id',$request->id)->delete();
        return response()->json(['success' => 'Role deleted successfully!','title' => 'Roles']);
    }
}
