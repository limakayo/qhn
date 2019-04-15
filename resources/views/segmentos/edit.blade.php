@extends('layouts.admin')

@section('content')
    <h2>Segmentos <small>Editar</small></h2>

    <form action="{{ url('admin/segmentos', ['id' => $segmento->id]) }}" method="post">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $segmento->nome }}">
      </div>
      <div class="form-group">
        <label for="nome">Segmento</label>
        <input type="text" name="segmento" id="segmento" class="form-control" value="{{ $segmento->segmento }}">
      </div>
      <div class="form-group">
        <label for="nome">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{ $segmento->slug }}">
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

@endsection
