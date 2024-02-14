<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){

        $permissions=Permission::get();
       
        return view('permissions.index',compact('permissions'));
}
public function create(){

    $permissions=new Permission();
    return view('permissions.create',compact('permissions'));
}
public function store(Request $request){

    $permissions=new Permission();
    // $roles->name=$request->name;
    // $roles->description=$request->description;
    // dd($services);
    // $services->save();
    
    $data=$request->all();
    // return $data;
    Permission::create($data);
    return redirect()->route('permissions.index');

}
public function edit(Request $request,$id){

    $permissions=Permission::find($id);

    return view('permissions.create',compact('permissions'));

}
public function update(Request $request,$id){

    $permissions=Permission::find($id);
    
    $data=$request->all();
    
    $permissions->update($data);
    return redirect()->route('permissions.index');

}
public function delete($id){

    $permissions=Permission::find($id);
    $permissions->delete();
    return redirect()->route('permissions.index');

}

}
