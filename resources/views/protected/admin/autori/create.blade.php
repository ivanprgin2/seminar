@extends('protected.admin.master')

@section('title', 'Add') 

@section('content')

<div class="panel panel">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">Add</h3>
  </div>
  <div class="panel-body">
		<!-- linija ispod dodali smo rutu admin autori store -->
    {!! Form::open(['route'=>['admin.autori.store']]) !!}   
		
		<div class="form-group">
			{!! Form::label('ime','Name:') !!}
			{!! Form::text('ime',null,['class'=>'form-control']) !!}
			{!! errors_for('ime',$errors) !!}
		</div>			
		<div class="form-group">
			{!! Form::label('prezime','Surname:') !!}
			{!! Form::text('prezime',null,['class'=>'form-control']) !!}
			{!! errors_for('prezime',$errors) !!}
		</div>						
		<div class="form-group">
			{!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	

  </div>
</div>


@endsection