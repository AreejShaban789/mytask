@extends('layout.mastereback')
@section('content')

<br><br>
<div class=" fluid-container content-wrapper">
    @if(Auth::user()->hasRole('manager'))
    <h2 class="text_center">Read Post</h2>
    <h2 class="text_center">Save Post</h2>
    <h2 class="text_center">Create Post</h2>
    <h2 class="text_center">Delete Post</h2>
    <h2 class="text_center">Edit Post</h2>
@endif


</div>




@endsection