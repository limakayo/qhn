@extends('layouts.app')

@section('title')
Serviços -
@endsection

@section('description')
Assistência técnica autorizada de Nobreaks e Estabilizadores em Curitiba. Serviços especializados e locação de Nobreaks.
@endsection

@section('content')
	<div class="background-servicos">
		<div class="container">
			<div class="segmento-message">
					<h1>Serviços</h1>
			</div>
		</div>
	</div>
	<div class="container" style="margin-bottom: 2em">
		{!! Breadcrumbs::render('servicos') !!}
		<div class="row" style="margin-top:2em;">
			<div class="col-md-6">
				<h3><i class="material-icons">build</i> Assistência Técnica</h3>
				<p>Especializada na assistência técnica de <strong>Nobreaks e Estabilizadores</strong> de grande, médio e pequeno porte.</p>
			</div>
			<div class="col-md-6">
				<h3><i class="material-icons">assignment</i> Dimensionamento de Cargas e Consultoria</h3>
				<p>Contamos com uma equipe de profissionais capacitados a lhe auxiliar na escolha do Nobreak adequado para sua missão-crítica, evitando transtornos como danos em sua carga ou o comprometimento do seu sistema.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h3><i class="material-icons">verified_user</i> Autorizada</h3>
				<p>Assistência técnica autorizada <strong>NHS e SMS Legrand</strong>.</p>
			</div>
			<div class="col-md-6">
				<h3><i class="material-icons">swap_horiz</i> Locação de Nobreak</h3>
				<p>Dispomos de uma grande variedade de Nobreaks e Estabilizadores de diversas marcas e modelos disponíveis para locação, para suprir a sua necessidade.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h3><i class="material-icons">description</i> Orçamento</h3>
				<p>Nosso orçamento é gratuito e sem compromisso.</p>
			</div>
		</div>

	</div>
@endsection
