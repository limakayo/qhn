@extends('layouts.app')

@section('title')
Geradores Toyama -
@endsection

@section('description')
Encontre Geradores Toyama com os melhores preços e condições. Acesse e faça uma cotação!
@endsection

@section('content')
	<div class="bd-pageheader bd-geradores">
		<div class="container container-estabilizadores">
			<h1>Geradores</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 style="margin-top:1em;">Geradores Toyama</h2>
				<hr>
			</div>			
			@foreach($geradores as $gerador)
			<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 nobreaks-nobreak nobreaks-item" style="text-align:center">
	      <a class="nobreak-marcas" href="geradores/{{ $gerador->slug }}" title="{{ $gerador->nome }}">
	        <img class="img-thumbnail thumb-nobreak" src="{{ asset('fotos_gerador') }}/{{ $gerador->foto_principal }}" alt="{{ $gerador->nome }}">
	        <h3 class="nobreaks-nobreak-title">{{ $gerador->nome }}</h3>
	      </a>
	    </div>
	    @endforeach
	  </div>
	</div>
@endsection
