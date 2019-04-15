<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gerador;
use App\Http\Requests;

class GeradorController extends Controller
{
    public function index()
    {
        $geradores = Gerador::all();
        return view('geradores', compact('geradores'));
    }

    public function admin()
    {
        $geradores = Gerador::all();
        return view('geradores.index', compact('geradores'));
    }

    public function create()
    {
        return view('geradores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gerador = new Gerador;

        $gerador->nome = $request->nome;
        $gerador->especificacao = $request->especificacao;
        $gerador->caracteristicas = $request->caracteristicas;

        $nomeArquivo = str_replace(' ', '_', $gerador->nome);

        if ($gerador->save()) {
            if ($request->hasFile('foto_principal')) {
              $foto = $request->file('foto_principal');

              $destinationPath = 'fotos_gerador';
              $arquivo = $gerador->id.'.'.$foto->getClientOriginalExtension();
              $foto->move($destinationPath, $arquivo);

              $gerador->foto_principal = $arquivo;
              $gerador->save();              
            }

            return redirect()->action('GeradorController@admin');
        };
        return 'Ocorreu algum erro';
    }

    public function show($slug)
    {
        $gerador = Gerador::findBySlug($slug);
        return view('gerador', compact('gerador'));
    }

    public function edit($id)
    {
      $gerador = Gerador::findOrFail($id);
      return view('geradores.edit', compact('gerador'));
    }

    public function update(Request $request, $id)
    {
        $gerador = gerador::findOrFail($id);

        $gerador->nome = $request->nome;
        $gerador->especificacao = $request->especificacao;
        $gerador->caracteristicas = $request->caracteristicas;

        $nomeArquivo = str_replace(' ', '_', $gerador->nome);

        if ($gerador->save()) {
            if ($request->hasFile('foto_principal')) {
              $foto = $request->file('foto_principal');

              $destinationPath = 'fotos_gerador';
              $arquivo = $gerador->id.'.'.$foto->getClientOriginalExtension();
              $foto->move($destinationPath, $arquivo);

              $gerador->foto_principal = $arquivo;
              $gerador->save();              
            }

            return redirect()->action('GeradorController@admin');
        };
        return 'Ocorreu algum erro';
    }

    public function destroy($id)
    {
      gerador::destroy($id);
      return redirect()->action('GeradorController@admin');
    }
}
