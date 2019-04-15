@extends('layouts.app')

@section('title')
Soluções para {{ $segmento->segmento }} -
@endsection

@section('description')
As melhores Soluções para {{ $segmento->segmento }} em Curitiba para proteger seus equipamentos é na QHN Nobreaks. Faça uma cotação agora mesmo!
@endsection

@section('content')
	<div class="background-{{ $segmento->slug }}">
		<div class="container">
			<div class="segmento-message">
					<h1>Soluções para {{ $segmento->segmento }}</h1>
			</div>
		</div>
	</div>
	<div class="container">
		{!! Breadcrumbs::render('segmento', $segmento) !!}
	
		@foreach($segmentos as $seg)
			<div class="row">
				<div class="col-xs-12">
					<h2>{{ $seg->nome }}</h2>
					<hr>	
				</div>
			</div>
			<div class="row">
			@foreach($seg->nobreaks as $nobreak)
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 nobreaks-nobreak nobreaks-item" style="text-align:center">
		      <a class="nobreak-marcas" href="nobreaks/{{ $nobreak->slug }}" title="{{ $nobreak->nome }}">
		        <img class="img-thumbnail thumb-nobreak" src="{{ asset('fotos') }}/{{ $nobreak->foto_principal }}" alt="{{ $nobreak->nome }}">
		        <h3 class="nobreaks-nobreak-title">{{ $nobreak->nome }}</h3>
		        <p class="nobreak-potencia">Potência: 
			        @if($nobreak->potencia_va)
			        <span>{{ $nobreak->potencia_va }}VA</span>
			        @elseif($nobreak->potencia_kva)
			        <span>{{ $nobreak->potencia_kva }}kVA</span>
			        @elseif($nobreak->potencia_va_min)
			        <span>{{ $nobreak->potencia_va_min }}VA a {{ $nobreak->potencia_va_max }}VA</span>
			        @elseif($nobreak->potencia_kva_min)
							<span>{{ $nobreak->potencia_kva_min }}kVA a {{ $nobreak->potencia_kva_max }}kVA</span>
			        @endif
		        </p>
		        <p class="nobreak-linha">Linha: <span>{{ $nobreak->linha->nome }}</span></p>
		      </a>
		    </div>
			@endforeach
			</div>
		@endforeach
	</div>
@endsection
