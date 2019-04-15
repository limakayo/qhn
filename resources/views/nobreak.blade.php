@extends('layouts.app')

@section('title')
{{ $nobreak->nome }} -
@endsection

@section('description')
{{ $nobreak->nome }} {{ $linha->nome }} em Curitiba pelo menor preço na QHN Nobreaks. Veja as especificações, características do produto e faça uma cotação!
@endsection

@section('content')
	<div class="background-{{ strtolower($marca->nome) }}">
		<div class="marca-message">
				<h2 style="visibility:hidden">{{ $marca->nome }}</h2>
		</div>
	</div>
	<div class="container">
		<section class="row marcas">
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
		{!! Breadcrumbs::render('nobreak', $nobreak) !!}
		<h1 class="nobreak-title">{{ $nobreak->nome }}</h1>
		<h3 style="font-size: 1.25rem">{{ $linha->nome }}</h3>
		<hr>
		<div class="row">
			<!-- FOTOS -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin-bottom">
				<span class="zoom img-thumbnail" id="foto">
					<img class="img-fluid" src="{{ asset('fotos/'.$nobreak->foto_principal) }}" alt="{{ $nobreak->nome }}" id="imagem">
				</span>
				<div class="row">
					<div class="col-xs-4">
						<a href="#" class="thumb-photo">
							<img class="img-thumbnail" src="{{ asset('fotos/'.$nobreak->foto_principal) }}" alt="{{ $nobreak->nome }}">
						</a>
					</div>
					@foreach($nobreak->fotos as $foto)
						<div class="col-xs-4">
							<a href="#" class="thumb-photo">
								<img class="img-thumbnail" src="{{ asset('fotos/'.$foto->arquivo) }}" alt="{{ $nobreak->nome }}">
							</a>
						</div>
					@endforeach
				</div>
			</div>


			<!-- ESPECIFICAÇÕES -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-bottom: 2rem">
				<h3 class="nobreak-subtitle">Especificações</h3>
				<hr>
				
				@if($nobreak->potencia_kva)
					<p><strong>Potência:</strong> {{ $nobreak->potencia_kva }}kVA/{{ $nobreak->potencia_w }}W</p>
				@endif
				@if($nobreak->potencia_va)
					<p><strong>Potência:</strong> {{ $nobreak->potencia_va }}VA/{{ $nobreak->potencia_w }}W</p>
				@endif
				@if($nobreak->tomadas)
					<p><strong>Tomadas:</strong> {{ $nobreak->tomadas }}</p>
				@endif
				@if($nobreak->autonomia)
					<p><strong>Autonomia *:</strong> {{ $nobreak->autonomia }}</p>
				@endif
				@if($nobreak->baterias)
					<p><strong>Bateria:</strong> {{ $nobreak->baterias }}</p>
				@endif
				@if($nobreak->exp_bateria)
					<p><strong>Expansão Bateria:</strong> {{ $nobreak->exp_bateria }}</p>
				@endif
				@if($nobreak->dimensoes)
					<p><strong>Dimensões:</strong> {{ $nobreak->dimensoes }}</p>
				@endif
				@if($nobreak->especificacao)
					{!! $nobreak->especificacao !!}
				@endif
				
				@if($nobreak->catalogo)
					<a href="{{ asset('catalogos/'.$nobreak->catalogo) }}" target="_blank" class="btn btn-secondary">Catálogo</a>
				@endif
				@if($nobreak->manual)
					<a href="{{ asset('manuais/'.$nobreak->manual) }}" target="_blank" class="btn btn-secondary">Manual</a>
				@endif

			</div>

			<div class="clearfix hidden-md-up"></div>

			<!-- PEDIDO DE COTAÇÃO -->

			<div class="col-xs-12 col-md-4 col-lg-4" style="margin-bottom: 2rem">
				<h3>Pedido de Cotação</h3>
				<hr>
				@if (session('data'))
					<div class="alert alert-success" role="alert">
						{{ session('data') }}
					</div>
				@endif
				<form action="{{ url('cotacao') }}" method="post">
					<div class="form-group @if ($errors->has('nome')) has-danger @endif">
						<label for="nome">Nome</label>
						<input type="text" id="nome" name="nome" class="form-control @if ($errors->has('nome')) form-control-danger @endif" required>
						@if ($errors->has('nome'))
							<div class="form-control-feedback">{{ $errors->first('nome') }}</div>
						@endif
					</div>
					<div class="form-group @if ($errors->has('email')) has-danger @endif">
						<label for="email">E-mail</label>
						<input type="email" id="email" name="email" class="form-control @if ($errors->has('email')) form-control-danger @endif" required>
						@if ($errors->has('email'))
							<div class="form-control-feedback">{{ $errors->first('email') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="telefone">Telefone</label>
						<input type="text" id="telefone" name="telefone" class="form-control telefone" required>
					</div>
					<div class="form-group @if ($errors->has('produto')) has-danger @endif">
						<label for="produto">Produto</label>
						<input type="text" id="produto" name="produto" value="{{ $nobreak->nome }}" class="form-control @if ($errors->has('produto')) form-control-danger @endif" required readonly>
						@if ($errors->has('produto'))
							<div class="form-control-feedback">{{ $errors->first('produto') }}</div>
						@endif
					</div>
					@if($nobreak->potencia_kva || $nobreak->potencia_kva_min)
						<div class="form-group">
							<label for="potencia">Potência</label>
							<input type="text" id="potencia" name="potencia" class="form-control" required>
						</div>
					@endif
					<div class="form-group">
						<label for="mensagem">Mensagem <span class="opcional">(opcional)</span></label>
						<textarea id="mensagem" name="mensagem" cols="30" rows="3" class="form-control"></textarea>
					</div>					
					@if ($errors->has('g-recaptcha-response'))
					<div class="alert alert-danger" role="alert">
					  <strong>Captcha inválido.</strong>
					</div>
					@endif
					{!! app('captcha')->display(); !!}
				
					<div style="text-align: right">
						<button class="btn btn-primary" style="margin-top:1em" id="sendButton" data-loading-text="Loading...">Enviar</button>
					</div>
				</form>
			</div>

			<div class="clearfix"></div>

			<!-- CARACTERISTICAS -->

			@if($nobreak->caracteristicas || $nobreak->observacoes || $nobreak->protecoes || $nobreak->modelos)

				<div class="col-xs-12 col-md-9 col-lg-8">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						@if ($nobreak->caracteristicas)
					  <li class="nav-item">
					    <a class="nav-link active prevent-default" data-toggle="tab" href="#caracteristicas" role="tab">Características</a>
					  </li>
					  @endif
					  @if ($nobreak->observacoes)
					  <li class="nav-item">
					    <a class="nav-link prevent-default" data-toggle="tab" href="#observacoes" role="tab">Observações</a>
					  </li>
					  @endif
					  @if ($nobreak->protecoes)
					  <li class="nav-item">
					    <a class="nav-link prevent-default" data-toggle="tab" href="#protecoes" role="tab">Proteções</a>
					  </li>
					  @endif
					  @if ($nobreak->modelos)
					  <li class="nav-item">
					    <a class="nav-link prevent-default" data-toggle="tab" href="#modelos" role="tab">Modelos</a>
					  </li>
					  @endif
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						@if($nobreak->caracteristicas)
					  <div class="tab-pane active" id="caracteristicas" role="tabpanel">
					  	<h3 style="margin: 1em 0">Características</h3>
							{!! $nobreak->caracteristicas !!}
						</div>
						@endif
						@if($nobreak->observacoes)
					  <div class="tab-pane" id="observacoes" role="tabpanel">
					  	<h3 style="margin: 1em 0">Observações</h3>
					  	{!! $nobreak->observacoes !!}
					  </div>
					  @endif
					  @if($nobreak->protecoes)
					  <div class="tab-pane" id="protecoes" role="tabpanel">
					  	<h3 style="margin: 1em 0">Proteções</h3>
					  	{!! $nobreak->protecoes !!}
					  </div>
					  @endif
					  @if($nobreak->modelos)
					  <div class="tab-pane" id="modelos" role="tabpanel">
					  	<h3 style="margin: 1em 0">Modelos</h3>
					  	{!! $nobreak->modelos !!}
					  </div>
					  @endif
					</div>

				</div>
					
					@if ($relacionados)
						<!-- RELACIONADOS -->
						<div class="col-xs-12 col-md-3 col-lg-4">
							<h3>Relacionados</h3>
							<hr>
							@foreach($relacionados as $relacionado)
							<div class="col-xs-6 col-sm-6 col-md-12 col-lg-6 nobreaks-nobreak nobreaks-item">
				        <a class="nobreak-relacionado" href="{{ url('nobreaks/'.$relacionado->slug) }}" title="{{ $relacionado->nome }}">
				        	<img class="img-thumbnail thumb-relacionados" src="{{ asset('fotos/'.$relacionado->foto_principal) }}" alt="{{ $relacionado->nome }}">
				          <h3 class="nobreaks-nobreak-title">{{ $relacionado->nome }}</h3>
				          @if($relacionado->potencia_va)
				          	<p class="nobreak-potencia">Potência: <span>{{ $relacionado->potencia_va }}</span></p>
				          @endif
				          <p class="nobreak-linha">Linha: <span>{{ $relacionado->linha->nome }}</span></p>
				        </a>
				      </div>
				      @endforeach
						</div>
					@endif

				@else

					@if($relacionados)
						<!-- RELACIONADOS -->
						<div class="col-xs-12">
							<h3>Relacionados</h3>
							<hr>
							@foreach($relacionados as $relacionado)
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 nobreaks-nobreak nobreaks-item">
				        <a class="nobreak-relacionado" href="{{ url('nobreaks/'.$relacionado->slug) }}" title="{{ $relacionado->nome }}">
				        	<img class="img-thumbnail thumb-relacionados" src="{{ asset('fotos/'.$relacionado->foto_principal) }}" alt="{{ $relacionado->nome }}">
				          <h3 class="nobreaks-nobreak-title">{{ $relacionado->nome }}</h3>
				          @if($relacionado->potencia_va)
				          	<p class="nobreak-potencia">Potência: <span>{{ $relacionado->potencia_va }}</span></p>
				          @endif
				          <p class="nobreak-linha">Linha: <span>{{ $relacionado->linha->nome }}</span></p>
				        </a>
				      </div>
				      @endforeach
						</div>
					@endif
				
			@endif
			</div>

			
	</div>
@endsection
