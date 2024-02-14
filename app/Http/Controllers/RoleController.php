<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){

        $roles=Role::get();
       
        return view('roles.index',compact('roles'));
}
public function create(){

    $roles=new Role();
    return view('roles.create',compact('roles'));
}
public function store(Request $request){

    $roles=new Role();
    // $roles->name=$request->name;
    // $roles->description=$request->description;
    // dd($services);
    // $services->save();
    
    $data=$request->all();
    // return $data;
    Role::create($data);
    return redirect()->route('roles.index');

}
public function edit($id){

    $roles=Role::find($id);

    return view('roles.create',compact('roles'));

}
public function update(Request $request,$id){

    $roles=Role::find($id);
    
    $data=$request->all();
    
    $roles->update($data);
    return redirect()->route('roles.index');

}
public function delete($id){

    $roles=Role::find($id);
    $roles->delete();
    return redirect()->route('roles.index');

}

}
