@extends('layouts.admin')

@section('content')
    <h2>Linhas <small>Editar</small></h2>
    <hr>
    <form action="{{ url('admin/linhas', ['id' => $linha->id]) }}" method="post">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $linha->nome }}">
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

@endsection
