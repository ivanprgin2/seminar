@extends('master')

@section('title', 'Edit Profile')

@section('content')
 <div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h1 class="panel-title pull-left">Uredi profil</h1>
  </div>

	@if (session()->has('flash_message'))
		<div class="alert alert-success">{{ session()->get('flash_message') }}</div>
	@endif
 <div class="panel-body">
	{!! Form::model($user, ['method' => 'PATCH', 'route' => ['profiles.update', $user->id]]) !!}

		<!-- email Field -->
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
			{!! errors_for('email', $errors) !!}
		</div>


		<!-- first_name Field -->
		<div class="form-group">
			{!! Form::label('first_name', 'First Name:') !!}
			{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
			{!! errors_for('first_name', $errors) !!}
		</div>

		<!-- last_name Field -->
		<div class="form-group">
			{!! Form::label('last_name', 'Last Name:') !!}
			{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
			{!! errors_for('last_name', $errors) !!}

		</div>

		<!-- Password field -->
		<div class="form-group">
			{!! Form::label('password', 'Password:') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
			<p class="help-block">Leave password blank to NOT edit the password.</p>
			{!! errors_for('password', $errors) !!}
		</div>

		<!-- Password Confirmation field -->
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Repeat Password:') !!}
			{!! Form::password('password_confirmation', ['class' => 'form-control'] ) !!}
		</div>


		<!-- Update Profile Field -->
		<div class="form-group">
			{!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
		</div>
	{!! Form::close() !!}
</div>
@stop