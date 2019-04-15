@extends('layouts.admin')

@section('content')

    <h2>Estabilizadores</h2>
    <hr>
    <div class="row">
      @foreach($estabilizadores as $estabilizador)
      <div class="col-md-3">
        <div class="card">
          @if (count($estabilizador->fotos_estabilizador) > 0)
          <img class="card-img-top img-fluid" src="{{ asset('fotos_estabilizador/'.$estabilizador->fotos_estabilizador->first()->arquivo) }}" alt="Card image cap">
          @endif
          <div class="card-block">
            <h4 class="card-title">{{ $estabilizador->nome }}</h4>
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.estabilizadores.edit', ['id' => $estabilizador->id]) }}" class="btn btn-secondary">Editar</a>
              </div>
              <div class="col-md-6">
                <form class="delete" action="{{ url('admin/estabilizadores', ['id' => $estabilizador->id]) }}" method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger">Remover</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-5">
        <a href="{{ route('admin.estabilizadores.create') }}" class="btn btn-primary">Novo estabilizador</a>
      </div>
    </div>

@endsection
