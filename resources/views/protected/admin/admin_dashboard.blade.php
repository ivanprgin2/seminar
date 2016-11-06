@extends('protected.admin.master')

@section('title', 'Admin')

@section('content')

    @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
    @endif


    <div class="jumbotron">
    	<div class="container-fluid">
        	<h1>Admin</h1>
        	
    	</div>
    </div>


@endsection