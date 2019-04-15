@extends('layouts.app')

@section('description')
Na QHN Nobreaks você encontra Nobreaks e Estabilizadores pelo menor preço em Curitiba. Confira!
@endsection

@section('content')
	<!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
      <div class="intro-message">
          <h1>A energia não pode parar</h1>
          <h2 class="hidden-sm-down">Temos a proteção ideal para você</h2>
          <a href="{{ route('nobreaks.index') }}">Conheça nossos Nobreaks</a>
      </div>
      <div class="logo-business-partner">
        <img src="{{ asset('images/legrand_partner.jpg') }}" alt="Legrand Business Partner UPS"/>
      </div>
    </div>
    <section class="row marcas">
        <ul>
            <li class="col-xs-12 col-md-6 nhs">
                <a href="{{ route('marca', 'nhs') }}" class="marca">
                    <img src="{{ asset('images/nhs_inicio.png') }}" alt="NHS"/>
                </a>
            </li>
            <li class="col-xs-12 col-md-6 sms">
                <a href="{{ route('marca', 'sms') }}" class="marca">
                    <img src="{{ asset('images/sms_inicio.png') }}" alt="SMS"/>
                </a>
            </li>
        </ul>
    </section>
    <section class="segmentos">
        <div class="container">
            <div style="text-align: center; padding-bottom:0.2em; color: white">
                <h2 style="font-weight: normal">Encontre o Nobreak ideal para o seu segmento</h2>
            </div>
            <hr>
            <ul class="row lista-segmentos">
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'impressao') }}">
                        <i class="material-icons dp48">print</i><br>
                        Impressão
                    </a>
                </li>
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'controle-de-acesso') }}">
                        <i class="material-icons dp48">lock</i><br>
                        Controle de Acesso
                    </a>
                </li>
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'estacoes-de-trabalho') }}">
                        <i class="material-icons dp48">computer</i><br>
                        Estações de Trabalho
                    </a>
                </li>
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'automacao') }}">
                        <i class="material-icons dp48">settings</i><br>
                        Automação
                    </a>
                </li>
            </ul>
            <ul class="row lista-segmentos">
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'medico-hospitalar') }}">
                        <i class="material-icons dp48">local_hospital</i><br>
                        Médico-Hospitalar
                    </a>
                </li>
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'refrigeracao') }}">
                        <i class="material-icons dp48">kitchen</i><br>
                        Refrigeração
                    </a>
                </li>
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'seguranca-eletronica') }}">
                        <i class="material-icons dp48">security</i><br>
                        Segurança Eletrônica
                    </a>
                </li>
                <li class="col-xs-6 col-md-3">
                    <a href="{{ route('segmento', 'servidores') }}">
                        <i class="material-icons dp48">dns</i><br>
                        Servidores
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
