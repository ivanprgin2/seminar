@extends('protected.admin.master')

@section('title', 'Edit') 

@section('content')

<div class="panel panel">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">{{'Edit autor - '.$autor->ime.' '.$autor->prezime}}</h3>
  </div>
  <div class="panel-body">
		
    {!! Form::open(['route'=>['admin.autori.update', $autor->id], 'method'=>'PUT']) !!}   
							
		<div class="form-group">
			{!! Form::label('ime','Edit name:') !!}
			{!! Form::text('ime', null, ['class'=>'form-control', 'placeholder'=>'new name']) !!}    
			{!! errors_for('ime',$errors) !!} 
		</div>	

		<div class="form-group">
			{!! Form::label('prezime','Edit surname:') !!}
			{!! Form::text('prezime', null, ['class'=>'form-control', 'placeholder'=>'Enter surname']) !!}    
			{!! errors_for('prezime',$errors) !!} 
		</div>	

		<div class="form-group">
			{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

  </div>
</div>


@endsection