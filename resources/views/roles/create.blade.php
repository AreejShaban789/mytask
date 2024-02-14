@extends('layout.mastereback')
@section('content')
 

<br><br><br>
<div class="container-fluid">
    <div class="content-wrapper">

    <form action="{{ $roles->id !=null ? route('roles.update',['id'=>$roles->id]): route('roles.store') }}" method="post" enctype="multipart/form-data">
   
        @csrf
        <label>Role</label>
        <br>
<input class="form-control" type="text"  value="{{ isset($role)? $role->name: '' }}" name="name">
<label>Guard Name</label>
        <br>
<input class="form-control" type="text"  value="{{ isset($role)? $role->guard_name: '' }}" name="guard_name">

<br>
 {{-- <label> Product Price</label>
<input class="form-control" type="number"  value="" name="product_price">
<br>  --}}

<input class="btn btn-danger" type="submit" value="Save">

    </form>
</div></div>



@endsection