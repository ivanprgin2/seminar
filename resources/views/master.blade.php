<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Video</title>
    <meta name="description" content="Basic Authentication with Sentinel and Laravel">
    <meta name="author" content="Andre Madarang">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="img/favicon.ico">
	
</head>
<body>

    <header>

        <nav class="navbar navbar-inverse" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              @if(!Sentinel::check())
              <a class="navbar-brand" href="{{ url('/') }}">Videos</a>
              @else 
              <a class="navbar-brand" href="{{ url('/') }}">Users</a>
              @endif
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                 @if(!Sentinel::check())  <!-- ako nije korisnik logiran prikaži mu linkove home, about i contact, a ako je onda samo kavomati -->
                    <li class="{{ set_active('/') }}"><a href="{{ url('/') }}">Home</a></li>
                    <li class="{{ set_active('about') }}"><a href="{{ url('about') }}">Info</a></li>
                    <li class="{{ set_active('contact') }}"><a href="{{ url('contact') }}">Contact</a></li>
                 @else
                    <li class="{{ set_active('user') }}"><a href="{{ url('user') }}">Home</a></li>
                    <li class="{{ set_active('standardUser/video') }}"><a href="{{ url('/standardUser/video') }}">Vids</a></li>
                    <li class="{{ set_active('standardUser/popis') }}"><a href="{{ url('/standardUser/popis') }}">List</a></li>
                @endif
              </ul>
              <ul class="nav navbar-nav navbar-right">
                @if (!Sentinel::check())  <!-- provjera je li korisnik autoriziran -->
                    <li class="{{ set_active('register') }}"><a href="{{ url('register') }}"><span class="glyphicon glyphicon-check"> Register</a></li>
                    <li class="{{ set_active('login') }}"><a href="{{ url('login') }}"><span class="glyphicon glyphicon-log-in"> Login</a></li>
                @else
                    <li class="{{ set_active('profiles') }}"><a href="{{ url('profiles') }}/{{Sentinel::getUser()->id}}"><span class="glyphicon glyphicon-user">Profile</a></li>
                    <li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
                @endif
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

    </header>

    <div class="container">
        @yield('content')
    </div>


<!-- JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>