@extends('layouts.app')

@section('title')
Nobreaks {{ $marca->nome }} -
@endsection

@section('description')
Encontre Nobreaks {{ $marca->nome }} com os melhores preços e condições. Acesse e faça uma cotação!
@endsection

@section('content')
	@if($marca->nome === 'SMS')
		<div id="carouselSlides" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="{{ asset('images') }}/mono_rack.jpg" alt="SMS Legrand Monofásicos Rack">
		    </div>
		    <div class="carousel-item">
		     	<img class="d-block w-100" src="{{ asset('images') }}/mono_torre.jpg" alt="Legrand Monofásicos Torre">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="{{ asset('images') }}/tri.jpg" alt="Legrand Trifásicos Convencionais">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="{{ asset('images') }}/modular.jpg" alt="Legrand Trifásicos Modulares">
		    </div>
		  </div>
		</div>
	@else
		<div class="background-{{ strtolower($marca->nome) }}">
			<div class="marca-message">
					<h1 style="visibility:hidden">{{ $marca->nome }}</h1>
			</div>
		</div>
	@endif
	<div class="container">
		<section class="row marcas" style="margin-top: 1em">
        <ul>
            <li class="col-xs-6 col-sm-3">
                <a href="{{ route('marca', 'nhs') }}" class="marca marca-nobreaks">
                    <h2 class="background nhs-logo grayscale" style="margin-top: 16px;" id="titulo-nhs">NHS</h2>
                </a>
            </li>
            <li class="col-xs-6 col-sm-3" style="border-right: none">
                <a href="{{ route('marca', 'sms') }}" class="marca marca-nobreaks">
                    <h2 class="background sms-logo grayscale" style="height: 80px" id="titulo-sms">SMS Legrand</h2>
                </a>
            </li>
            <li class="col-xs-6 col-sm-3 schneider">
                <a href="{{ route('marca', 'schneider') }}" class="marca marca-nobreaks">
                    <h2 class="background schneider-logo grayscale" style="margin-top: 12px;" id="titulo-schneider">Schneider Electric</h2>
                </a>
            </li>
            <li class="col-xs-6 col-sm-3 apc">
                <a href="{{ route('marca', 'apc') }}" class="marca marca-nobreaks">
                    <h2 class="background apc-logo grayscale" style="margin-top: 10px;" id="titulo-apc">APC by Schneider Electric</h2>
                </a>
            </li>
        </ul>
    </section>

		{!! Breadcrumbs::render('marca', $marca) !!}
		
		<div class="row">
			<div class="col-xs-12">
				<h2>Nobreaks {{ $marca->nome }}</h2>
				<hr>
			</div>			
			@foreach($nobreaks as $nobreak)
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

			@if($estabilizadores->first())
		    <div class="col-xs-12">
					<h2>Estabilizadores</h2>
					<hr>
				</div>
				@foreach($estabilizadores as $estabilizador)
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 nobreaks-nobreak nobreaks-item" style="text-align:center">
		      <a class="nobreak-marcas" href="estabilizadores/{{ $estabilizador->slug }}" title="{{ $estabilizador->nome }}">
		        <img class="img-thumbnail thumb-nobreak" src="{{ asset('fotos_estabilizador') }}/{{ $estabilizador->foto_principal }}" alt="{{ $estabilizador->nome }}">
		        <h3 class="nobreaks-nobreak-title">{{ $estabilizador->nome }}</h3>
		        <p class="nobreak-potencia">Potência: 
			        @if($estabilizador->potencia_va)
			        <span>{{ $estabilizador->potencia_va }}VA</span>
			        @elseif($estabilizador->potencia_kva)
			        <span>{{ $estabilizador->potencia_va }}kVA</span>
			        @elseif($estabilizador->potencia_kva_min)
							<span>{{ $estabilizador->potencia_kva_min }}kVA a {{ $estabilizador->potencia_kva_max }}kVA</span>
			        @endif
		        </p>
		      </a>
		    </div>
		    @endforeach
		  @endif
	  </div>
	</div>
@endsection
