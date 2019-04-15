@extends('layouts.app')

@section('title')
Contato -
@endsection

@section('description')
Entre em contato, visualize nossa localização e saiba nosso horário de atendimento.
@endsection

@section('maps')
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGpvaGu09JbzHZddGMVIgOpDg2XS3kg0g&callback=initMap"></script>
@endsection

@section('content')
		<div class="background-contato">
			<div class="container">
				<div class="segmento-message">
						<h1>Contato</h1>
				</div>
			</div>
		</div>
		<div class="mapa">
			<div id="map"></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6" style="margin-top: 2em">
					<div style="margin-bottom:2em">
						<h3>Endereço</h3>
						<hr>
						<address>
							R. Dr. Corrêa Coelho, 522 - Jardim Botânico<br>
							Curitiba - PR<br>
							CEP 80210-350
						</address>
					</div>
					<div style="margin-bottom:2em">
						<h3>Telefone</h3>
						<hr>
						<p><a href="tel:+5504130264220" rel="nofollow"><i class="material-icons left-icon">phone</i> (41) 3026-4220</a></p>
						<p><a href="tel:+55041988585318" rel="nofollow"><img src="{{ asset('images/whats.svg') }}" class="whats-icon" alt="WhatsApp"> (41) 98858-5318</a></p>
					</div>
					<div style="margin-bottom:2em">
						<h3>E-mail</h3>
						<hr>
						<p><strong>Comercial: </strong><a href="mailto:vendas@qhn.com.br" rel="nofollow">vendas@qhn.com.br</a></p>
						<p><strong>Assistência Técnica: </strong><a href="mailto:assistencia@qhn.com.br" rel="nofollow">assistencia@qhn.com.br</a></p>
						<p><strong>Outros: </strong><a href="mailto:qhn@qhn.com.br" rel="nofollow">qhn@qhn.com.br</a></p>
					</div>
					<div style="margin-bottom:2em">
						<h3>Horário de atendimento</h3>
						<hr>
						<p>De <strong>segunda a sexta-feira</strong></p>
						<p>Das 8:30 às 12:00 horas</p>
						<p>Das 13:30 às 17:30 horas</p>
					</div>
				</div>
				<div class="col-md-6" style="margin-top: 2em">
					<h3>Formulário de contato</h3>
					<hr>
					@if (session('data'))
						<div class="alert alert-success" role="alert">
							{{ session('data') }}
						</div>
					@endif
					<form action="{{ url('contato') }}" method="post">
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
						<div class="form-group  @if ($errors->has('telefone')) has-danger @endif">
							<label for="telefone">Telefone</label>
							<input type="text" id="telefone" name="telefone" class="form-control telefone @if ($errors->has('telefone')) form-control-danger @endif" required>
							@if ($errors->has('telefone'))
								<div class="form-control-feedback">{{ $errors->first('telefone') }}</div>
							@endif
						</div>
						<div class="form-group  @if ($errors->has('mensagem')) has-danger @endif">
							<label for="mensagem">Mensagem</label>
							<textarea id="mensagem" name="mensagem" cols="30" rows="3" class="form-control @if ($errors->has('mensagem')) form-control-danger @endif" required></textarea>
							@if ($errors->has('mensagem'))
								<div class="form-control-feedback">{{ $errors->first('mensagem') }}</div>
							@endif
						</div>
						@if ($errors->has('g-recaptcha-response'))
						<div class="alert alert-danger" role="alert">
						  <strong>Captcha inválido.</strong>
						</div>
						@endif
						{!! app('captcha')->display(); !!}

						<div style="text-align:right">
							<button class="btn btn-primary" id="sendButton" data-loading-text="Loading...">Enviar</button>
						</div>
					</form>
				</div>

			</div>
		</div>
@endsection
