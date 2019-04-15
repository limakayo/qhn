@extends('layouts.admin')

@section('content')
    <h2>Linhas</h2>
    <hr>
    <div class="row">
      @foreach($linhas as $linha)
        <div class="col-md-3">
          <div class="card card-block">
            <h4 class="card-title">{{ $linha->nome }}</h4>
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.linhas.edit', ['id' => $linha->id]) }}" class="btn btn-secondary">Editar</a>
              </div>
              <div class="col-md-6">
                <form class="delete" action="{{ url('admin/linhas', ['id' => $linha->id]) }}" method="POST">
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
        <a href="{{ route('admin.linhas.create') }}" class="btn btn-primary">Nova linha</a>
      </div>
    </div>
@endsection
