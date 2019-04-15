@extends('layouts.app')

@section('title')
Nobreaks -
@endsection

@section('description')
Nobreaks com preço baixo é na QHN Nobreaks. Os melhores modelos e marcas de Nobreaks em oferta. Peça uma cotação agora!
@endsection

@section('content')
	<div class="bd-pageheader bd-nobreaks">
		<div class="container container-nobreaks">
			<h1>Nobreaks</h1>
			<p class="lead">Tecnologia de ponta e alta confiabilidade<br> para proteger seus equipamentos.</p>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="breadcrumb-nobreak">
			{!! Breadcrumbs::render('nobreaks') !!}
			</div>
			<nobreaks></nobreaks>
		</div>
	</div>
@endsection
