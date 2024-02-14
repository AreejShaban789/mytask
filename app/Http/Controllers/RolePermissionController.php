<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
     $roles=Role::get();



     return view('rolepermission.index',compact('roles'));


    }
    public function create($roleId)
    {

     $roles = Role::findOrFail($roleId);
        $permissions = Permission::all();

     return view('rolepermission.create', compact('roles', 'permissions'));


    }

    public function store(Request $request, $roleId)
    {


        $role = Role::find($roleId);
        if(!$role){
            abort(404);
        }
        $permissions=$request->name;

        RolePermission::where('role_id',$roleId)->delete();
        $role_users=Role::where('id',$roleId)->pluck('id');

        if(count($permissions) > 0){


            foreach($permissions as $permission){
                $per['role_id']=$roleId;
                $per['permission_id']=$permission;
                RolePermission::create($per);

            }
        }
        return redirect()->back()->with('SUCCESS','Permissions Updated Successfully!');


        // return redirect()->route('rolepermission.index')->with('success', 'Permissions assigned to users with the role.');
    }

}
