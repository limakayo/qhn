@extends('layouts.admin')

@section('content')
    <h2>Segmentos</h2>
    <hr>
    <div class="row">
      @foreach($segmentos as $segmento)
        <div class="col-md-3">
          <div class="card card-block">
            <h4 class="card-title">{{ $segmento->nome }}</h4>
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.segmentos.edit', ['id' => $segmento->id]) }}" class="btn btn-secondary">Editar</a>
              </div>
              <div class="col-md-6">
                <form class="delete" action="{{ url('admin/segmentos', ['id' => $segmento->id]) }}" method="POST">
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
        <a href="{{ route('admin.segmentos.create') }}" class="btn btn-primary">Novo segmento</a>
      </div>
    </div>
@endsection
