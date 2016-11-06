@extends('protected.admin.master')

@section('title', 'Edit') 

@section('content')

<div class="panel panel">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">{{'Edit "'.$zanr->naziv.'"'}}</h3>
  </div>
  <div class="panel-body">
		<!-- linija ispod dodali smo rutu admin kavomati store -->
    {!! Form::open(['route'=>['admin.zanrovi.update', $zanr->id], 'method'=>'PUT']) !!}   
							
		<div class="form-group">
			{!! Form::label('naziv','Edit title:') !!}
			{!! Form::text('naziv', null, ['class'=>'form-control', 'placeholder'=>'add new']) !!}    
			
			{!! errors_for('naziv',$errors) !!} <!-- drugi način validiranja -->
		</div>			
		
		<div class="form-group">
			{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

  </div>
</div>


@endsection