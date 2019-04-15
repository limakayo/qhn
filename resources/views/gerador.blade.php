@extends('layouts.app')

@section('title')
Gerador Toyama {{ $gerador->nome }} -
@endsection

@section('description')
Gerador Toyama {{ $gerador->nome }} em Curitiba pelo menor preço na QHN Nobreaks. Veja as especificações, características do produto e faça uma cotação!
@endsection

@section('content')
	<div class="bd-pageheader bd-geradores">
		<div class="container container-estabilizadores">
			<h1>Geradores Toyama</h1>
		</div>
	</div>
	<div class="container">
		<h1 class="estabilizador-title" style="margin-top:1em">{{ $gerador->nome }}</h1>
		<hr>
		<div class="row">
			<!-- FOTOS -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin-bottom">
				<span class="zoom img-thumbnail" id="foto">
					<img class="img-fluid" src="{{ asset('fotos_gerador/'.$gerador->foto_principal) }}" alt="{{ $gerador->nome }}" id="imagem">
				</span>
				<div class="row">
					<div class="col-xs-4">
						<a href="#" class="thumb-photo">
							<img class="img-thumbnail" src="{{ asset('fotos_gerador/'.$gerador->foto_principal) }}" alt="{{ $gerador->nome }}">
						</a>
					</div>
				</div>
			</div>


			<!-- ESPECIFICAÇÕES -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-bottom: 2rem">
				<h3 class="estabilizador-subtitle">Especificações</h3>
				<hr>
				@if($gerador->especificacao)
					{!! $gerador->especificacao !!}
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
						<input type="text" id="produto" name="produto" value="Gerador Toyama {{ $gerador->nome }}" class="form-control @if ($errors->has('produto')) form-control-danger @endif" required readonly>
						@if ($errors->has('produto'))
							<div class="form-control-feedback">{{ $errors->first('produto') }}</div>
						@endif
					</div>
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

			@if($gerador->caracteristicas)
				<div class="col-xs-12 col-md-9 col-lg-8">
					<h2>Características</h2>
					<hr>
					{!! $gerador->caracteristicas !!}
				</div>
			@endif
			</div>			
	</div>
@endsection

