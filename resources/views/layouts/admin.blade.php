<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>QHN Admin</title>

		<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('css/all.css') }}">

		<!-- Custom CSS -->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
		<link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
	</head>
	<body>


			<nav class="navbar navbar-dark navbar-static-top bg-inverse">
				<div class="container">
					<div class="clearfix">
							<button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Alternar Navegação">&#9776;</button>
							<a class="navbar-brand hidden-md-up" href="#">QHN Admin</a>
					</div>
					<div class="collapse navbar-toggleable-sm" id="bd-main-nav" style="height:0px">
							<ul class="nav navbar-nav menu">
								<li class="nav-item">
									<a class="navbar-brand hidden-sm-down" href="#">
											QHN Admin
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-item nav-link {{ Request::is('admin/linhas*') ? 'active' : ''}}"href="{{ route('admin.linhas.index') }}">Linhas</a>
								</li>
								<li class="nav-item">
									<a class="nav-item nav-link {{ Request::is('admin/marcas*') ? 'active' : ''}}" href="{{ route('admin.marcas.index') }}">Marcas</a>
								</li>
								<li class="nav-item">
									<a class="nav-item nav-link {{ Request::is('admin/nobreaks*') ? 'active' : ''}}" href="{{ route('admin.nobreaks.index') }}">Nobreaks</a>
								</li>
								<li class="nav-item">
									<a class="nav-item nav-link {{ Request::is('admin/estabilizadores*') ? 'active' : ''}}" href="{{ route('admin.estabilizadores.index') }}">Estabilizadores</a>
								</li>
								<li class="nav-item">
									<a class="nav-item nav-link {{ Request::is('admin/segmentos*') ? 'active' : ''}}" href="{{ route('admin.segmentos.index') }}">Segmentos</a>
								</li>
								@if (Auth::guest())
										<li class="nav-item">
											<a class="nav-item nav-link" href="{{ url('/login') }}">Login</a>
										</li>
										<li class="nav-item">
											<a class="nav-item nav-link" href="{{ url('/register') }}">Register</a>
										</li>
								@else
										<li class="nav-item">
											<span class="nav-item nav-link" href="#">{{ Auth::user()->name }}</span>
										</li>
										<li class="nav-item">
											<a class="nav-item nav-link" href="{{ url('/logout') }}">Logout</a>
										</li>
								@endif
							</ul>
					</div>
				</div>
			</nav>

			<div class="container" style="margin-top:3em">
				@yield('content')
			</div>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
		<!-- Tether -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
		<!-- jQuery Zoom -->
		<script src="{{ URL::asset('js/jquery.zoom.js') }}"></script>
		<!-- Summernote -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
		<!-- Custom Scripts -->
		<script src="{{ URL::asset('js/admin-scripts.js') }}"></script>
	</body>
</html>
