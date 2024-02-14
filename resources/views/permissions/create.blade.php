@extends('layout.mastereback')
@section('content')


<br><br><br>
<div class="container-fluid">
    <div class="content-wrapper">

    <form action="{{ $permissions->id !=null ? route('permissions.update',['id'=>$permissions->id]): route('permissions.store') }}" method="post" enctype="multipart/form-data">
   
        @csrf
        <label>Permissions</label>
        <br>
<input class="form-control" type="text"  value="{{ isset($permissions)? $permissions->event_name: '' }}" name="name">
<label>Guard Name</label>
        <br>
<input class="form-control" type="text"  value="{{ isset($permissions)? $permissions->guard_name: '' }}" name="guard_name">

<br>
 {{-- <label> Product Price</label>
<input class="form-control" type="number"  value="" name="product_price">
<br>  --}}

<input class="btn btn-danger" type="submit" value="Save">

    </form>
</div></div>



@endsection