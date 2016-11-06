@extends('master')

@section('title', 'Users only')

@section('content')

    @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
    @endif
<div class="jumbotron">
	<div class="container-fluid">
    @if (Sentinel::check())
        <h1>User page</h1>
     
    @endif

   
	</div>
</div>

@endsection

