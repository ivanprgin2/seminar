@extends('protected.admin.master')

@section('title', 'User prof')

@section('content')

<div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h1 class="panel-title pull-left">{{ $user->first_name }}</h1>
    @if(Sentinel::check())
       <a href='{{ $user->id }}/edit' class='btn btn-info pull-right'>edit</a>
    @endif
  </div>
    
    <div class="panel-body">
    <ul>
        <li>Account Type: {{ $user_role }}</li>
        <li>Email Address: {{ $user->email }}</li>
        <li>First Name: {{ $user->first_name }}</li>
        <li>Last Name: {{ $user->last_name }}</li>
    </ul>
    </div>
    
@endsection