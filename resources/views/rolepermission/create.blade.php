@extends('layout.mastereback')
@section('content')
<div class="container-fluid">
    <div class="content-wrapper">
    <h1 class="text-center fw-bold">Add Permissions for {{ $roles->name }}</h1>
    <form method="post" action="{{ route('rolepermission.store', ['roleId' => $roles->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Select Permissions:</label>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="name[]" value="{{ $permission->id }}" {{ in_array($permission->id, $roles->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Add Permissions</button>
    </form>
</div>
</div>
@endsection