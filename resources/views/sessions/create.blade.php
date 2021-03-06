@extends('master')

@section('title', 'Login')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'sessions.store']) !!}
                        <fieldset>

                            @if (session()->has('flash_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('flash_message') }}
                                </div>
                            @endif

                            @if (session()->has('error_message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error_message') }}
                                </div>
                            @endif

                            <!-- Email field -->
                            <div class="form-group">
                                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!}
                                {!! errors_for('email', $errors) !!}
                            </div>

                            <!-- Password field -->
                            <div class="form-group">
                                {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control', 'required' => 'required'])!!}
                                {!! errors_for('password', $errors) !!}
                            </div>

                            <div class="checkbox">
                                <!-- Remember me field -->
                                <div class="form-group">
                                    <label>
                                        {!! Form::checkbox('remember', 'remember') !!} Remember me
                                    </label>
                                </div>
                            </div>

                            <!-- Submit field -->
                            <div class="form-group">
                                {!! Form::submit('Login', ['class' => 'btn btn btn-lg btn-primary btn-block']) !!}
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div style="text-align:center">
					<style>
                        .panel-heading {
                                        color:white;
                                        background-color:#141f1f;
                                        }   
						p {  
                            color: white;
							background-color: #141f1f;   
						  }
                          em {color:pink;}
                        a:link  {
                                    color:##4dff4d;
                                }
                        a:visited {
                                    color:#80ff80;
                                  }
					</style>
                    <p><a href="{{ url('forgot_password') }}">Forgot Password?</a></p>

                    <p><strong>Standard User:</strong><em> user@user.com</em><br>
                    <strong>Standard User Password:</strong><em> sentineluser</em></p>

                    <p><strong>Admin User:</strong><em> admin@admin.com</em><br>
                    <strong>Admin Password:</strong><em> sentineladmin</em></p>
                </div>


            </div>
        </div>
    </div>

@endsection