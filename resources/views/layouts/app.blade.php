<!DOCTYPE html>
<html lang="pt-br" ng-app="app">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="@yield('description')">
    <meta name="author" content="Kayo Lima">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico')}}" sizes="16x16"/>
		<title>@yield('title') QHN Nobreaks</title>

    	<!-- CSS -->
    	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
			<!-- Custom CSS -->
      <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
			<link href="{{ asset('css/app.animations.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-50700827-1', 'auto');
        ga('send', 'pageview');

      </script>
	</head>
	<body>
        <header class="navbar navbar-light navbar-static-top bd-navbar">
                <nav>
                    <div class="clearfix">
                        <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Alternar Navegação">&#9776;</button>
                        <a class="navbar-brand hidden-md-up" href="{{ route('index') }}">QHN Nobreaks</a>
                    </div>
                    <div class="collapse navbar-toggleable-sm" id="bd-main-nav" style="height:0px">
                        <ul class="nav navbar-nav menu pull-md-left">
                          <li class="nav-item">
                            <a class="navbar-brand hidden-sm-down" href="{{ route('index') }}" title="QHN Nobreaks">
                                <img src="{{ asset('images/logo_qhn_pequeno.png') }}" alt="QHN Nobreaks">
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('nobreaks') ? 'active' : ''}}" href="{{ Request::is('nobreaks') ? '#' : route('nobreaks.index') }}">Nobreaks</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('estabilizadores*') ? 'active' : ''}}" href="{{ Request::is('estabilizadores') ? '#' : route('estabilizadores.index') }}">Estabilizadores</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('nobreaks-nhs*') ? 'active' : ''}}" href="{{ Request::is('nobreaks-nhs*') ? '#' : route('marca', 'nhs') }}">NHS</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('nobreaks-sms*') ? 'active' : ''}}" href="{{ Request::is('nobreaks-sms*') ? '#' : route('marca', 'sms') }}">SMS</a>
                          </li>
                          
													<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Soluções</a>
														<div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown" style="min-width: 200px">
                              <a class="dropdown-item {{ Request::is('geradores*') ? 'active' : ''}}" href="{{ Request::is('geradores') ? '#' : route('geradores.index') }}">Geradores</a>
                              <a class="dropdown-item {{ Request::is('solucoes-para-impressao') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-impressao') ? '#' : route('segmento', 'impressao') }}">Impressão</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-controle-de-acesso') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-controle-de-acesso') ? '#' : route('segmento', 'controle-de-acesso') }}">Controle de Acesso</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-estacoes-de-trabalho') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-estacoes-de-trabalho') ? '#' : route('segmento', 'estacoes-de-trabalho') }}">Estações de Trabalho</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-automacao') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-automacao') ? '#' : route('segmento', 'automacao') }}">Automação</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-medico-hospitalar') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-medico-hospitalar') ? '#' : route('segmento', 'medico-hospitalar') }}">Médico-Hospitalar</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-refrigeracao') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-refrigeracao') ? '#' : route('segmento', 'refrigeracao') }}">Refrigeração</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-seguranca-eletronica') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-seguranca-eletronica') ? '#' : route('segmento', 'seguranca-eletronica') }}">Segurança Eletrônica</a>
															<a class="dropdown-item {{ Request::is('solucoes-para-servidores') ? 'active' : ''}}" href="{{ Request::is('solucoes-para-servidores') ? '#' : route('segmento', 'servidores') }}">Servidores</a>
														</div>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('servicos') ? 'active' : ''}}" href="{{ route('servicos') }}">Serviços</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ Request::is('contato') ? 'active' : ''}}" href="{{ route('contato') }}">Contato</a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav pull-md-right menu-direito">
                            <li class="nav-fone" style="padding-right: 15px">
                                <img src="{{ asset('images/phone.svg') }}" class="whats" alt="Telefone">
                                (41) 3026-4220
                            </li>
                            <li class="nav-fone">
                                <img src="{{ asset('images/whatsapp.svg') }}" class="whats" alt="WhatsApp">
                                <span style="float:left">(41) 98858-5318</span>
                            </li>
                        </ul>
                    </div>
                </nav>
        </header>


      @yield('content')

      <!-- Modal
      <div class="modal fade" id="modal-inicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Informação</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Prezados Clientes,</p>
              <p>Informamos que devido a problemas técnicos nas operadoras de telefonia, nosso telefone fixo não está funcionando. Pedimos que, por gentileza, entrem em contato conosco através do Whatsapp: (41) 98858-5318</p>
            </div>
          </div>
        </div>
      </div>-->

		<!-- Footer -->
        <footer>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-md-10">
                  <nav class="nav nav-inline footer-link">
                      <a href="{{ route('index') }}" class="nav-link">Home</a>
                      <a href="{{ Request::is('nobreaks') ? '#' : route('nobreaks.index') }}" class="nav-link">Nobreaks</a>
                      <a href="{{ Request::is('estabilizadores') ? '#' : route('estabilizadores.index') }}" class="nav-link">Estabilizadores</a>
                      <a href="{{ Request::is('geradores') ? '#' : route('geradores.index') }}" class="nav-link">Geradores</a>
                      <a href="{{ route('servicos') }}" class="nav-link {{ Request::is('servicos') ? 'active' : ''}}">Serviços</a>
                      <a href="{{ route('contato') }}" class="nav-link {{ Request::is('contato') ? 'active' : ''}}">Contato</a>
                  </nav>
                  <p class="copyright text-muted small">Copyright &copy; QHN Nobreaks 2018. Todos os direitos reservados.</p>
                </div>
                <div class="col-xs-12 col-md-2" style="text-align:right">
                  <div style="text-align:right;font-size:11px">
                    <p>Desenvolvido por<br> <a href="mailto:lima.kayo@gmail.com">Kayo Lima</a></p>
                  </div>
                </div>
              </div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.3/jquery.mask.min.js"></script>

        <script src="{{ URL::asset('js/scripts.js') }}"></script>
        <script>
        /*$(function() {
          var showed = localStorage.getItem("SHOW")
          if (!showed) {
            $('#modal-inicio').modal('show');
            localStorage.setItem("SHOW", true)
          }
        })*/
      </script>
        @yield('maps')
        <!-- begin olark code -->
        <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
        f[z]=function(){
        (a.s=a.s||[]).push(arguments)};var a=f[z]._={
        },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
        f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
        0:+new Date};a.P=function(u){
        a.p[u]=new Date-a.p[0]};function s(){
        a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
        hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
        return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
        b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
        b.contentWindow[g].open()}catch(w){
        c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
        var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
        b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
        loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
        /* custom configuration goes here (www.olark.com/documentation) */
        olark.identify('4375-583-10-6385');/*]]>*/</script><noscript><a href="https://www.olark.com/site/4375-583-10-6385/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
        <!-- end olark code -->
	</body>
</html>
