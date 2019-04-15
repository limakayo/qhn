@extends('layouts.admin')

@section('content')
    <h2>Marcas <small>Cadastrar</small></h2>

    <form action="{{ url('admin/marcas') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
