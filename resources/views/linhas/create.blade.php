@extends('layouts.admin')

@section('content')
    <h2>Linhas <small>Cadastrar</small></h2>
    <hr>
    <form action="{{ url('admin/linhas') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

@endsection
