@extends('layouts.admin')

@section('content')

    <h2>Nobreaks <small>Cadastrar</small></h2>

    <form action="{{ url('nobreaks', ['id' => $nobreak]) }}" enctype="multipart/form-data" method="post">
      {{ method_field('PUT') }}
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
          <input type="text" name="nome" id="nome" class="form-control" value="{{ $nobreak->nome }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_va">Potência VA</label>
          <input type="text" name="potencia_va" id="potencia_va" class="form-control" value="{{ $nobreak->potencia_va }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_w">Potência W</label>
          <input type="text" name="potencia_w" id="potencia_w" class="form-control" value="{{ $nobreak->potencia_w }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_va_min">Potência VA Min</label>
          <input type="text" name="potencia_va_min" id="potencia_va_min" class="form-control" value="{{ $nobreak->potencia_va_min }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_va_max">Potência VA Máx</label>
          <input type="text" name="potencia_va_max" id="potencia_va_max" class="form-control" value="{{ $nobreak->potencia_va_max }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_kva">Potência kVA</label>
          <input type="text" name="potencia_kva" id="potencia_kva" class="form-control" value="{{ $nobreak->potencia_kva }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_kva_min">Potência kVA Min</label>
          <input type="text" name="potencia_kva_min" id="potencia_kva_min" class="form-control" value="{{ $nobreak->potencia_kva_min }}">
        </div>
        <div class="form-group col-md-2">
          <label for="potencia_kva_max">Potência kVA Max</label>
          <input type="text" name="potencia_kva_max" id="potencia_kva_max" class="form-control" value="{{ $nobreak->potencia_kva_max }}">
        </div>
        <div class="form-group col-md-2">
          <label for="tomadas">Tomadas</label>
          <input type="text" name="tomadas" id="tomadas" class="form-control" value="{{ $nobreak->tomadas }}">
        </div>
        <div class="form-group col-md-2">
          <label for="autonomia">Autonomia</label>
          <input type="text" name="autonomia" id="autonomia" class="form-control" value="{{ $nobreak->autonomia }}">
        </div>
        <div class="form-group col-md-2">
          <label for="baterias">Bateria</label>
          <input type="text" name="baterias" id="baterias" class="form-control" value="{{ $nobreak->baterias }}">
        </div>
        <div class="form-group col-md-2">
          <label for="exp_bateria">Expansão Bateria</label>
          <input type="text" name="exp_bateria" id="exp_bateria" class="form-control" value="{{ $nobreak->exp_bateria }}">
        </div>
        <div class="form-group col-md-2">
          <label for="dimensoes">Dimensões</label>
          <input type="text" name="dimensoes" id="dimensoes" class="form-control" value="{{ $nobreak->dimensoes }}">
        </div>
        <div class="form-group col-md-2">
          <label for="linha">Linha</label>
          <select class="form-control" name="linha">
            @foreach($linhas as $linha)
              <option value="{{ $linha->id }}" {{ $nobreak->linha->id == $linha->id ? 'selected' : ''}}>{{ $linha->nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="marca">Marca</label>
          <select class="form-control" name="marca">
            @foreach($marcas as $marca)
              <option value="{{ $marca->id }}" {{ $nobreak->marca->id == $marca->id ? 'selected' : ''}}>{{ $marca->nome }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-12">
          @foreach($segmentos as $segmento)
            <label class="form-check-label">
              <input class="form-check-input" {{ in_array($segmento->id, $segmentosSelecionados) ? 'checked' : ''}} name="segmentos[]" type="checkbox" value="{{ $segmento->id }}"> {{ $segmento->nome }}
            </label>
          @endforeach
        </div>
        <div class="form-group col-md-12 caracteristicas">
          <label for="summernote">Especificações</label>
          <textarea class="form-control summernote" name="especificacao">{{ $nobreak->especificacao }}</textarea>
        </div>
        <div class="form-group col-md-12 caracteristicas">
          <label for="summernote">Características</label>
          <textarea class="form-control summernote" name="caracteristicas">{{ $nobreak->caracteristicas }}</textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="summernote">Observações</label>
          <textarea class="form-control summernote" name="observacoes">{{ $nobreak->observacoes }}</textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="summernote">Proteções</label>
          <textarea class="form-control summernote" name="protecoes">{{ $nobreak->protecoes }}</textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="summernote">Modelos</label>
          <textarea class="form-control summernote" name="modelos">{{ $nobreak->modelos }}</textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-secondary">Editar</button>
    </form>

@endsection
