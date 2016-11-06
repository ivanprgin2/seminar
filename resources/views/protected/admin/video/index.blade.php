@extends('protected.admin.master')

@section('title', 'video') 

@section('content')

@if(session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
		{{session()->get('flash_message')}}
		</div>
@endif  <!-- provjeravanje postoji li flash message, a ako postoji 
				ispiše ga nakon što smo unijeli novi kavomat -->

<div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">Vid</h3>
	<a href="{{ url('admin/video/create') }}" role="button" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add vid</a>

  </div>
  <div class="panel-body">
  @if ($video->count() < 1)
	<div class="well">
	Empty 
    <a href="{{ url('admin/video/create') }}" role="link">Add</a>
	</div>
	@else
   <div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">  <!-- izrada tablice u tabu kavomati koji punimo podacima iz db -->
    <tr>
		<th>ID</th>
		<th>Title</th>
		<th>Author</th>
		<th>Genre</th>
		<th>Release date</th>
		<th>Pic</th>
		<th width="15%">Options</th>
	</tr>

	@foreach ($video as $video)
		<tr>
			<td>{{ $video->id }}</td>
			<td><a href="{{ url('admin/video/'.$video->id.'/edit') }}">{{ $video->naslov }}</td>
			<td>{{ $video->autor->prezime.', '.$video->autor->ime }}</td>
			<td>{{ $video->zanr->naziv }}</td>
			<td>{{ $video->godina }}</td>
			<td><img src="{{ ($video->slika) }}" height="100" width="75"></td>
			
			<td>
					<a href="{{ url('admin/video/'.$video->id.'/edit') }}" role="button" class="btn btn-success btn-xs">Edit <!-- izmijenili smo url kako bi dodali edit po id-u -->
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<!-- a tag radi samo sa GET metodom -- >
					<!-- izmjena url-a -->
					<a data-toggle="modal" data-target="#delete{{$video->id}}" role="button" class="btn btn-danger btn-xs"> 
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
					</a>				
				
					<!-- Modal -->
					<div class="modal fade" id="delete{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
				  	 <div class="modal-dialog" role="document">
					  <div class="modal-content">
					   	  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">War!</h4>
					  	 </div>
					  	 <div class="modal-body">
					  		<p>Delete? - <strong> {{$video->naslov}}</strong>?</p>
					  	 </div>
					  	 <div class="modal-footer">
							{!! Form::open (['route'=>['admin.video.destroy',$video->id], 'method'=>'delete']) !!}
							<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
							<button type="submit" class="btn btn-danger">Yes</button> 
							{!! Form::close() !!}
					  	 </div>
					   </div>
				     </div>
				   </div>
				  
			</td>
		</tr>
	
	@endforeach
	
  </table>
	</div>
	@endif
  </div>
</div>



@endsection