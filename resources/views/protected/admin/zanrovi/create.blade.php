@extends('protected.admin.master')

@section('title', 'Add Genre') 

@section('content')

<div class="panel ">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">New genre</h3>
  </div>
  <div class="panel-body">
		<!-- linija ispod dodali smo rutu admin kavomati store -->
    {!! Form::open(['route'=>['admin.zanrovi.store']]) !!}   
		
		<div class="form-group">
			{!! Form::label('naziv','Genre') !!}
			{!! Form::text('naziv',null,['class'=>'form-control']) !!}
			{!! errors_for('naziv',$errors) !!}
		</div>								
		<div class="form-group">
			{!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

  </div>
</div>


@endsection