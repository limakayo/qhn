@extends('layouts.admin')

@section('content')

    <h2>Geradores <small>Cadastrar</small></h2>

    <form action="{{ url('geradores', ['id' => $gerador]) }}" enctype="multipart/form-data" method="post">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="row">
        <div class="form-group col-md-4">
          <label for="foto_principal">Foto Principal</label>
          <input type="file" name="foto_principal" id="foto_principal">
        </div>
        <div class="form-group col-md-4">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control" value="{{ $gerador->nome }}">
        </div>
        <div class="form-group col-md-12 caracteristicas">
          <label for="summernote">Especificações</label>
          <textarea class="form-control summernote" name="especificacao">{{ $gerador->especificacao }}</textarea>
        </div>
        <div class="form-group col-md-12 caracteristicas">
          <label for="summernote">Características</label>
          <textarea class="form-control summernote" name="caracteristicas">{{ $gerador->caracteristicas }}</textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-secondary">Editar</button>
    </form>

@endsection
