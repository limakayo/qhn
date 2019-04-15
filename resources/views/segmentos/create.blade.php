@extends('layouts.admin')

@section('content')
    <h2>Segmentos <small>Cadastrar</small></h2>

    <form action="{{ url('admin/segmentos') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control">
      </div>
      <div class="form-group">
        <label for="nome">Segmento</label>
        <input type="text" name="segmento" id="segmento" class="form-control">
      </div>
      <div class="form-group">
        <label for="nome">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
