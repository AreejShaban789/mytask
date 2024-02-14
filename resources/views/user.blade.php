@extends('layout.mastereback')
@section('content')
<br><br>

<div class="container-fluid content-wrapper">
    @if(Auth::user()->hasRole('user'))
    <h2 class="text_center">Read Post</h2>
    <h2 class="text_center">Save Post</h2>
@endif

</div>



@endsection