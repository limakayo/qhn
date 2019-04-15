@extends('layouts.admin')

@section('content')
    <h2>Marcas</h2>
    <hr>
    <div class="row">
      @foreach($marcas as $marca)
        <div class="col-md-3">
          <div class="card card-block">
            <h4 class="card-title">{{ $marca->nome }}</h4>
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.marcas.edit', ['id' => $marca->id]) }}" class="btn btn-secondary">Editar</a>
              </div>
              <div class="col-md-6">
                <form class="delete" action="{{ url('admin/marcas', ['id' => $marca->id]) }}" method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger">Remover</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-5">
        <a href="{{ route('admin.marcas.create') }}" class="btn btn-primary">Nova marca</a>
      </div>
    </div>
@endsection
