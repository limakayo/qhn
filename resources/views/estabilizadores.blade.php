@extends('layouts.app')

@section('title')
Estabilizadores -
@endsection

@section('description')
Estabilizadores com preço baixo é na QHN Nobreaks. Os melhores modelos e marcas de Estabilizadores em oferta. Peça uma cotação agora!
@endsection

@section('content')
	<div class="bd-pageheader bd-estabilizadores">
		<div class="container container-estabilizadores">
			<h1>Estabilizadores</h1>
			<p class="lead">Ideais para diminuir picos de tensão, proporcionar tensão estabilizada e garantir proteção.</p>
		</div>
	</div>
	<div class="content">
		<div class="container">
			<div class="breadcrumb-nobreak">
				{!! Breadcrumbs::render('estabilizadores') !!}
			</div>
			<estabilizadores></estabilizadores>
		</div>
	</div>
@endsection
