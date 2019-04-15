<!DOCTYPE html>
<html lang="pt-br" ng-app="app">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico')}}" sizes="16x16"/>
		<title>@yield('title') QHN Nobreaks</title>

    	<!-- CSS -->
    	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
			<!-- Custom CSS -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
			<link href="{{ asset('css/app.animations.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      @yield('recaptcha')
	</head>
	<body>
        <header class="navbar navbar-light navbar-static-top bd-navbar">
            <div class="container">
                <nav>
                    <div class="clearfix">
                        <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Alternar Navegação">&#9776;</button>
                        <a class="navbar-brand hidden-md-up" href="{{ route('index') }}">QHN Nobreaks</a>
                    </div>
                    <div class="collapse navbar-toggleable-sm" id="bd-main-nav" style="height:0px">
                        <ul class="nav navbar-nav menu pull-md-left">
                          <li class="nav-item">
                            <a class="navbar-brand hidden-sm-down" href="{{ route('index') }}" title="QHN Nobreaks">
                                <img src="{{ asset('images/logo.png') }}" alt="QHN Nobreaks">
                            </a>
                          </li>
                          <!--<li class="nav-item">
                            <a class="nav-item nav-link {{ Request::is('quem-somos') ? 'active' : ''}}" href="{{ route('quem-somos') }}">Quem somos</a>
                          </li>-->
                          <!--<li class="nav-item">
                            <a class="nav-item nav-link {{ Request::is('nobreaks*') ? 'active' : ''}}" href="{{ Request::is('nobreaks*') ? '#' : route('nobreaks.index') }}">Nobreaks</a>
                          </li>-->
                          <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
                            <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                              <a class="dropdown-item {{ Request::is('nobreaks*') ? 'active' : ''}}" href="{{ Request::is('nobreaks*') ? '#' : route('nobreaks.index') }}">Nobreaks</a>
                              <a class="dropdown-item {{ Request::is('estabilizadores*') ? 'active' : ''}}" href="{{ Request::is('estabilizadores*') ? '#' : route('estabilizadores.index') }}">Estabilizadores</a>
                            </div>
                          </li>-->
                          <li class="nav-item">
                            <a class="nav-item nav-link {{ Request::is('nobreaks') ? 'active' : ''}}" href="{{ Request::is('nobreaks') ? '#' : route('nobreaks.index') }}">Nobreaks</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-item nav-link {{ Request::is('estabilizadores*') ? 'active' : ''}}" href="{{ Request::is('estabilizadores') ? '#' : route('estabilizadores.index') }}">Estabilizadores</a>
                          </li>
													<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marcas</a>
                            <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown" style="min-width: 180px">
                              <a class="dropdown-item {{ Request::is('nobreaks-nhs*') ? 'active' : ''}}" href="{{ Request::is('nobreaks-nhs*') ? '#' : route('marca', 'nhs') }}">NHS</a>
															<a class="dropdown-item {{ Request::is('nobreaks-schneider*') ? 'active' : ''}}" href="{{ Request::is('nobreaks-schneider*') ? '#' : route('marca', 'schneider') }}">Schneider Electric</a>
															<a class="dropdown-item {{ Request::is('nobreaks-sms*') ? 'active' : ''}}" href="{{ Request::is('nobreaks-sms*') ? '#' : route('marca', 'sms') }}">SMS</a>
															<a class="dropdown-item {{ Request::is('nobreaks-apc*') ? 'active' : ''}}" href="{{ Request::is('nobreaks-apc*') ? '#' : route('marca', 'apc') }}">APC</a>
                            </div>
                          </li>
													<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Soluções</a>
														<div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown" style="min-width: 200px">
                              <a class="dropdown-item {{ Request::is('nobreaks-para-impressao') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-impressao') ? '#' : route('segmento', 'impressao') }}">Impressão</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-controle-de-acesso') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-controle-de-acesso') ? '#' : route('segmento', 'controle-de-acesso') }}">Controle de Acesso</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-estacoes-de-trabalho') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-estacoes-de-trabalho') ? '#' : route('segmento', 'estacoes-de-trabalho') }}">Estações de Trabalho</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-automacao') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-automacao') ? '#' : route('segmento', 'automacao') }}">Automação</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-medico-hospitalar') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-medico-hospitalar') ? '#' : route('segmento', 'medico-hospitalar') }}">Médico-Hospitalar</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-refrigeracao') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-refrigeracao') ? '#' : route('segmento', 'refrigeracao') }}">Refrigeração</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-seguranca-eletronica') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-seguranca-eletronica') ? '#' : route('segmento', 'seguranca-eletronica') }}">Segurança Eletrônica</a>
															<a class="dropdown-item {{ Request::is('nobreaks-para-servidores') ? 'active' : ''}}" href="{{ Request::is('nobreaks-para-servidores') ? '#' : route('segmento', 'servidores') }}">Servidores</a>
														</div>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('servicos') ? 'active' : ''}}" href="{{ route('servicos') }}">Serviços</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('contato') ? 'active' : ''}}" href="{{ route('contato') }}">Contato</a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav pull-md-right">
                            <li class="nav-fone" style="padding-right: 15px">
                                <img src="{{ asset('images/phone.svg') }}" class="whats" alt="Telefone">
                                (41) 3026-4220
                            </li>
                            <li class="nav-fone">
                                <img src="{{ asset('images/whatsapp.svg') }}" class="whats" alt="WhatsApp">
                                <span style="float:left">(41) 8858-5318</span>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

		@yield('content')

		<!-- Footer -->
        <footer>
            <div class="container">
                <nav class="nav nav-inline footer-link">
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                    <a href="{{ Request::is('nobreaks') ? '#' : route('nobreaks.index') }}" class="nav-link">Nobreaks</a>
										<a href="{{ Request::is('estabilizadores') ? '#' : route('estabilizadores.index') }}" class="nav-link">Estabilizadores</a>
                    <a href="{{ route('servicos') }}" class="nav-link {{ Request::is('servicos') ? 'active' : ''}}">Serviços</a>
                    <a href="{{ route('contato') }}" class="nav-link {{ Request::is('contato') ? 'active' : ''}}">Contato</a>
                </nav>
                <p class="copyright text-muted small">Copyright &copy; QHN Nobreaks 2016. Todos os direitos reservados.</p>
            </div>
        </footer>

        <!-- jQuery, Bootstrap, Tether, jQuery Zoom -->
				<script src="{{ asset('js/vendor.js') }}"></script>
				<!-- AngularJS -->
				<script src="{{ asset('js/app.js') }}"></script>

				<script src="{{ asset('js/app.module.js') }}"></script>
				<script src="{{ asset('js/core/core.module.js') }}"></script>
				<script src="{{ asset('js/core/nobreak/nobreak.module.js') }}"></script>
				<script src="{{ asset('js/core/nobreak/nobreak.service.js') }}"></script>
				<script src="{{ asset('js/nobreaks/nobreaks.module.js') }}"></script>
				<script src="{{ asset('js/nobreaks/nobreaks.component.js') }}"></script>
        <script src="{{ asset('js/core/estabilizador/estabilizador.module.js') }}"></script>
        <script src="{{ asset('js/core/estabilizador/estabilizador.service.js') }}"></script>
        <script src="{{ asset('js/estabilizadores/estabilizadores.module.js') }}"></script>
        <script src="{{ asset('js/estabilizadores/estabilizadores.component.js') }}"></script>

        <script src="{{ URL::asset('js/scripts.js') }}"></script>
        @yield('maps')
	</body>
</html>
