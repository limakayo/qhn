<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Segmento;

class SegmentoController extends Controller
{
  public function index()
  {
      $segmentos = Segmento::all();
      return view('segmentos.index', compact('segmentos'));
  }

  public function create() {
    return view('segmentos.create');
  }

  public function edit($id)
  {
    $segmento = Segmento::findOrFail($id);
    return view('segmentos.edit', compact('segmento'));
  }

  public function destroy($id)
  {
    Segmento::destroy($id);
    return redirect()->action('SegmentoController@index');
  }

  public function update(Request $request, $id)
  {
    $segmento = Segmento::findOrFail($id);
    $segmento->nome = $request->nome;
    $segmento->slug = $request->slug;
    $segmento->segmento = $request->segmento;
    if ($segmento->save()) {
        return redirect()->action('SegmentoController@index');
    };
    return 'Ocorreu algum erro';
  }

  public function segmentos()
  {
    return Segmento::orderBy('nome')->get();
  }

  public function store(Request $request)
  {
      $segmento = new Segmento;
      $segmento->nome = $request->nome;
      $segmento->slug = $request->slug;
      $segmento->segmento = $request->segmento;
      if ($segmento->save()) {
          return redirect()->action('SegmentoController@index');
      };
      return 'Ocorreu algum erro';
  }
}
