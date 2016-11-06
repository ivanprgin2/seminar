@extends('protected.admin.master')

@section('title', 'List')

@section('content')

<div class="panel panel-primary">
  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">Users</h3>
  </div>
 
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <th>id</th>
              <th>Email</th>
              <th>Name</th>
              <th>Last Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="profiles/{{ $user->id }}">{{ $user->email }}</a> <br>
                @if ($user->inRole($admin))
                <span class="label label-success">{{ 'Admin' }}</span>
                @endif
                </td>
                <td>{{ $user->first_name}}</td>
                <td>{{ $user->last_name}}</td>
             </tr>
            @endforeach

        </tbody>
    </table>
   </div>
 </div>
</div>
@stop