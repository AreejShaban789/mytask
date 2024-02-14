@extends('layout.mastereback')
@section('content')
<div class="container-fluid">
    <div class="content-wrapper">


    <h1 class="text-center fw-bold">Role Permissions</h1>
     

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Role</th>
            <th>Permission</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>

           <td><a class="btn btn-primary btn-sm"
                href="{{ route('rolepermission.create', ['roleId' => $role->id]) }}">Add Permission</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

@endsection