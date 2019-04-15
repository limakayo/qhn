@extends('layouts.admin')

@section('content')
    <h2>Marcas <small>Editar</small></h2>

    <form action="{{ url('admin/marcas', ['id' => $marca->id]) }}" method="post">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $marca->nome }}">
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

@endsection
