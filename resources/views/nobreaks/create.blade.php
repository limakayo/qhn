@extends('layouts.admin')

@section('content')
    <h2>Nobreaks <small>Cadastrar</small></h2>

    <form action="{{ url('nobreaks') }}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="form-group col-md-4">
          <label for="foto_principal">Foto Principal</label>
          <input type="file" name="foto_principal" id="foto_principal">
        </div>
        <div class="form-group col-md-4">
          <label for="fotos">Fotos</label>
          <input type="file" name="fotos[]" id="fotos" multiple>
        </div>
        <div class="form-group col-md-4">
          <label for="catalogo">Catálogo</label>
          <input type="file" name="catalogo" id="catalogo">
        </div>
        <div class="form-group col-md-4">
          <label for="manual">Manual</label>
          <input type="file" name="manual" id="manual">
        </div>
        <div class="form-group col-md-4">
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control" value="Nobreak ">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_va">Potência VA</label>
          <input type="text" name="potencia_va" id="potencia_va" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_w">Potência W</label>
          <input type="text" name="potencia_w" id="potencia_w" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_va_min">Potência VA Min</label>
          <input type="text" name="potencia_va_min" id="potencia_va_min" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_va_max">Potência VA Máx</label>
          <input type="text" name="potencia_va_max" id="potencia_va_max" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_kva">Potência kVA</label>
          <input type="text" name="potencia_kva" id="potencia_kva" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_kva_min">Potência kVA Min</label>
          <input type="text" name="potencia_kva_min" id="potencia_kva_min" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_kva_max">Potência kVA Max</label>
          <input type="text" name="potencia_kva_max" id="potencia_kva_max" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="tomadas">Tomadas</label>
          <input type="text" name="tomadas" id="tomadas" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="autonomia">Autonomia</label>
          <input type="text" name="autonomia" id="autonomia" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="baterias">Bateria</label>
          <input type="text" name="baterias" id="baterias" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="exp_bateria">Expansão Bateria</label>
          <input type="text" name="exp_bateria" id="exp_bateria" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="dimensoes">Dimensões</label>
          <input type="text" name="dimensoes" id="dimensoes" class="form-control">
        </div>
        <div class="form-group col-md-2">
          <label for="linha">Linha</label>
          <select class="form-control" name="linha">
            @foreach($linhas as $linha)
              <option value="{{ $linha->id }}">{{ $linha->nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="marca">Marca</label>
          <select class="form-control" name="marca">
            @foreach($marcas as $marca)
              <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-12">
          @foreach($segmentos as $segmento)
            <label class="form-check-label">
              <input class="form-check-input" name="segmentos[]" type="checkbox" value="{{ $segmento->id }}"> {{ $segmento->nome }}
            </label>
          @endforeach
        </div>

        <div class="form-group col-md-12 caracteristicas">
          <label for="summernote">Especificações</label>
          <textarea class="form-control summernote" name="especificacao"></textarea>
        </div>
        <div class="form-group col-md-12 caracteristicas">
          <label for="summernote">Características</label>
          <textarea class="form-control summernote" name="caracteristicas"></textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="summernote">Observações</label>
          <textarea class="form-control summernote" name="observacoes"></textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="summernote">Proteções</label>
          <textarea class="form-control summernote" name="protecoes"></textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="summernote">Modelos</label>
          <textarea class="form-control summernote" name="modelos"></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-secondary">Cadastrar</button>
    </form>

@endsection
