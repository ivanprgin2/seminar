@extends('master')

@section('title', 'List') 

@section('content')

@if(session()->has('flash_message'))
		<div class="alert alert-success alert-dismissible">
		{{session()->get('flash_message')}}
		</div>
@endif  <!-- provjeravanje postoji li flash message, a ako postoji 
				ispiše ga nakon što smo unijeli novi kavomat -->

<div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">Abecedni popis knjiga</h3>
 </div>
  <div class="panel-body">
 
   <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover"> 
     <tr>
		<td><a href="popis/{{$slovo='A'}}">A</td>
		<td><a href="popis/{{$slovo='B'}}">B</td>
		<td><a href="popis/{{$slovo='C'}}">C</td>
		<td><a href="popis/{{$slovo='D'}}">D</td>
		<td><a href="popis/{{$slovo='E'}}">E</td>
		<td><a href="popis/{{$slovo='F'}}">F</td>
		<td><a href="popis/{{$slovo='G'}}">G</td>
		<td><a href="popis/{{$slovo='H'}}">H</td>
		<td><a href="popis/{{$slovo='I'}}">I</td>
		<td><a href="popis/{{$slovo='J'}}">J</td>
		<td><a href="popis/{{$slovo='K'}}">K</td>
		<td><a href="popis/{{$slovo='L'}}">L</td>
		<td><a href="popis/{{$slovo='M'}}">M</td>
		<td><a href="popis/{{$slovo='N'}}">N</td>
		<td><a href="popis/{{$slovo='O'}}">O</td>
		<td><a href="popis/{{$slovo='P'}}">P</td>
		<td><a href="popis/{{$slovo='Q'}}">Q</td>
		<td><a href="popis/{{$slovo='R'}}">R</td>
		<td><a href="popis/{{$slovo='S'}}">S</td>
		<td><a href="popis/{{$slovo='T'}}">T</td>
		<td><a href="popis/{{$slovo='U'}}">U</td>
		<td><a href="popis/{{$slovo='V'}}">V</td>
		<td><a href="popis/{{$slovo='W'}}">W</td>
		<td><a href="popis/{{$slovo='X'}}">X</td>
		<td><a href="popis/{{$slovo='Y'}}">Y</td>
		<td><a href="popis/{{$slovo='Z'}}">Z</td>
	 </tr>
   </table>
  </div>
 </div>
</div>

<style>
.modal-header
{
    background-color: #ff4d4d;
}
</style>


@endsection