@extends('layouts.admin')

@section('content')
    <div class="row">
      <div class="col-sm-9">
        <h2>Nobreaks</h2>  
      </div>
      <div class="col-sm-3">
        <a href="{{ route('admin.nobreaks.create') }}" class="btn btn-primary">Novo nobreak</a>
      </div>
    </div>
    
    <hr>
    <div class="row">
      @foreach($nobreaks as $nobreak)
      <div class="col-md-3">
        <div class="card" style="min-height:250px">
          @if (count($nobreak->fotos) > 0)
          <img class="card-img-top img-fluid" style="width: 100px; margin: 0 auto; padding-top: 1em;" src="{{ asset('fotos/'.$nobreak->foto_principal) }}" alt="Card image cap">
          @endif
          <div class="card-block">
            <p class="card-title">{{ $nobreak->nome }}</p>
            <div class="row">
              <div class="col-md-6">
                <a href="{{ route('admin.nobreaks.edit', ['id' => $nobreak->id]) }}" class="btn btn-secondary btn-sm">Editar</a>
              </div>
              <div class="col-md-6">
                <form class="delete" action="{{ url('admin/nobreaks', ['id' => $nobreak->id]) }}" method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

@endsection
