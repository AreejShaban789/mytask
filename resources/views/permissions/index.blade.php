@extends('layout.mastereback')
@section('content')

<br><br><br>

    <div class="container-fluid"> 
        <div class="content-wrapper">
        <div class="text-end mb-4">
            <h2 class="text-center">Permissions</h2>
            <div>
                <a class="btn btn-success " href="{{ route('permissions.create') }}">Add Permission</a>
            </div></div> 
<table class="table table-stripped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Permission</th>
            <th>Guard Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name}}</td>
            <td><a class="btn btn-primary" href="{{ route('permissions.edit',['id'=>$permission->id ]) }}"><i class="fa fa-edit"></i>Edit</a>
            <a class="btn btn-danger" href="{{ route('permissions.delete',['id'=>$permission->id ]) }}" ><i class="fa fa-trash"></i>Delete</a></td>
        </tr>
        @endforeach
        
        
    </tbody>
</table>
</div></div>



@endsection