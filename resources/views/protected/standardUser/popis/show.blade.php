@extends('master')

@section('title', 'Vid') 

@section('content')

@if(session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
		{{session()->get('flash_message')}}
		</div>
@endif  <!-- provjeravanje postoji li flash message, a ako postoji 
				ispiše ga nakon što smo unijeli novi kavomat -->

<div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">List "{{ $slovo }}"</h3>
	<a href="{{ url('standardUser/popis') }}" role="button" class="btn btn-info btn-md pull-right"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Back</a>
  </div>
  <div class="panel-body">
  @if ($videos->count() < 1)
	<div class="well">
	empty
	</div>
	@else
   <div class="table-responsive">
  <table class="table table-striped table-bordered table-hover"> 
    <tr>
		<th>ID</th>
		<th>Title</th>
		<th>Author</th>
		<th>Genre</th>
		<th>Year</th>
		<th>SS</th>
	</tr>

	@foreach ($videos as $video)
		<tr>
			<td>{{ $video->id }}</td>
			<td>{{ $video->naslov }}</td>
			<td>{{ $video->autor->prezime.', '.$video->autor->ime }}</td>
			<td>{{ $video->zanr->naziv }}</td>
			<td>{{ $video->godina }}</td>
			<td><img src="{{ ($video->slika) }}" height="100" width="75"></td>
		</tr>
	
	@endforeach	
  </table>
	
	@endif
  
 </div>
</div>




@endsection