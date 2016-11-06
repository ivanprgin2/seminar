@extends('protected.admin.master')

@section('title', 'List') 

@section('content')

@if(session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
		{{session()->get('flash_message')}}
		</div>
@endif  <!-- provjeravanje postoji li flash message, a ako postoji 
				ispiše ga nakon što smo unijeli novi žanr -->

<div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">List</h3>
	<a href="{{ url('admin/autori/create') }}" role="button" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
  </div>
  <div class="panel-body">
  @if ($autori->count() < 1)
	<div class="well">
	No enetry
    <a href="{{ url('admin/autori/create') }}" role="link">Add new</a>
	</div>
	@else
   <div class="table-responsive">
  <table class="table table-striped table-hover">  <!-- izrada tablice u tabu kavomati koji punimo podacima iz db -->
    <tr>
		<th>ID</th>
		<th>Surn</th>
		<th>Name</th>	
		<th width="15%">Options</th>
	</tr>

	@foreach ($autori as $autor)
		<tr>
			<td>{{ $autor->id }}</td>
			<td>{{ $autor->prezime }}</td>
			<td>{{ $autor->ime }}</td>
			
			<td>
				<a href="{{ url('admin/autori/'.$autor->id.'/edit') }}" role="button" class="btn btn-success btn-xs">Edit <!-- izmijenili smo url kako bi dodali edit po id-u -->
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<!-- a tag radi samo sa GET metodom -- >
					<!-- izmjena url-a -->
					<a data-toggle="modal" data-target="#delete{{$autor->id}}" role="button" class="btn btn-danger btn-xs"> 
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
					</a>				
				
					<!-- Modal -->
					<div class="modal fade" id="delete{{$autor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <!-- id =sad svaki žanr ima svoj modal-->
				  	 <div class="modal-dialog" role="document">
					  <div class="modal-content">
					   	  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">!!!!</h4>
					  	 </div>
					  	 <div class="modal-body">
					  		<p>Are you sure that you wan to delete - <strong> {{$autor->ime}} {{$autor->prezime}}</strong>?</p>
					  	 </div>
					  	 <div class="modal-footer">
							{!! Form::open (['route'=>['admin.autori.destroy',$autor->id], 'method'=>'delete']) !!}  <!-- routa kojom šaljem id i koristim metodu delete -->
							<button type="button" class="btn btn-info" data-dismiss="modal">No</button>
							<button type="submit" class="btn btn-danger">Yes</button> <!-- dodali smo submit type -->
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