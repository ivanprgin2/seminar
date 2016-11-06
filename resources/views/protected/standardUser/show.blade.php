@extends('master')

@section('title', 'View Profile')

@section('content')
	
	<div class="panel panel-primary">
  		<div class="panel-heading clearfix">
    		<h1 class="panel-title pull-left">{{ $user->first_name }}'s Profile</h1>
	 @if(Sentinel::check())
		<a href="{{ route('profiles.edit', $user->id) }}" class="btn btn-info pull-right">Edit</a>
	 @endif
	 </div>
	<div class="panel-body">
	<ul>
		<li>Email Address: {{ $user->email }}</li>
		<li>First Name: {{ $user->first_name }}</li>
		<li>Last Name: {{ $user->last_name }}</li>
	</ul>
	</div>
	
@endsection