@extends('protected.admin.master')

@section('title', 'Edit') 

@section('content')

<div class="panel panel">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">{{'Edit vid "'.$video->naslov.'"'}}</h3>
  </div>
  <div class="panel-body">
		
    {!! Form::open(['route'=>['admin.video.update', $video->id], 'method'=>'PUT']) !!}   
							
		<div class="form-group">
			{!! Form::label('naslov','Title') !!}
			{!! Form::text('naslov',null,['class'=>'form-control','placeholder'=>'add title']) !!}
			{!! errors_for('naslov',$errors) !!}
		</div>		
		<div class="form-group">
			{!! Form::label('autor_id','Author') !!}
			{!! Form::select('autor_id',$autori, null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('zanr_id','Genre') !!}
			{!! Form::select('zanr_id',$zanrovi, null,['class'=>'form-control']) !!}	
		</div>
		<div class="form-group">
			{!! Form::label('godina','Release') !!}
			{!! Form::selectYear('godina', 1000, 2016, 1999, ['class'=>'form-control']) !!}
			{!! errors_for('godina',$errors) !!}
		</div>		
		<div class="form-group">
			{!! Form::label('slika','Pic') !!}
			{!! Form::text('slika',null,['class'=>'form-control','placeholder'=>'pic link']) !!}
			{!! errors_for('slika',$errors) !!}
		</div>							
		<div class="form-group">
			{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

  </div>
</div>


@endsection