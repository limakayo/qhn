@extends('layouts.admin')

@section('content')

    <h2>Geradores</h2>
    <hr>
    <div class="row">
      @foreach($geradores as $gerador)
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top img-fluid" src="{{ asset('fotos_gerador/'.$gerador->foto_principal) }}" alt="Card image cap">
          <div class="card-block">
            <h4 class="card-title">{{ $gerador->nome }}</h4>
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.geradores.edit', ['id' => $gerador->id]) }}" class="btn btn-secondary">Editar</a>
              </div>
              <div class="col-md-6">
                <form class="delete" action="{{ url('admin/geradores', ['id' => $gerador->id]) }}" method="POST">
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
        <a href="{{ route('admin.geradores.create') }}" class="btn btn-primary">Novo gerador</a>
      </div>
    </div>

@endsection
