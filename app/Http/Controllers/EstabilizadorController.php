<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estabilizador;
use App\Marca;
use App\FotoEstabilizador;
use App\Http\Requests;

class EstabilizadorController extends Controller
{
    public function index()
    {
        $estabilizadores = Estabilizador::all();
        return view('estabilizadores', compact('estabilizadores'));
    }

    public function marca($marca) 
    {
      $marca = Marca::where('nome', 'like', '%'.$marca.'%')->first();
      $estabilizadors = $marca->estabilizadors;
      return view('marca', compact('estabilizadors', 'marca'));
    }

    public function estabilizadores()
    {
        return Estabilizador::with('marca')->get();
        //$estabilizadors = Nobreak::all();
        //return view('estabilizadors', compact('estabilizadors'));
    }

    public function admin()
    {
        $estabilizadores = Estabilizador::all();
        return view('estabilizadores.index', compact('estabilizadores'));
    }

    public function create()
    {
        $marcas = Marca::all();
        return view('estabilizadores.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estabilizador = new Estabilizador;

        $estabilizador->nome = $request->nome;
        $estabilizador->especificacao = $request->especificacao;
        $estabilizador->potencia_va = $request->potencia_va;
        $estabilizador->potencia_w = $request->potencia_w;
        $estabilizador->potencia_kva = $request->potencia_kva;
        $estabilizador->potencia_va_min = $request->potencia_va_min;
        $estabilizador->potencia_va_max = $request->potencia_va_max;
        $estabilizador->potencia_kva_min = $request->potencia_kva_min;
        $estabilizador->potencia_kva_max = $request->potencia_kva_max;
        $estabilizador->tomadas = $request->tomadas;
        $estabilizador->dimensoes = $request->dimensoes;
        $estabilizador->caracteristicas = $request->caracteristicas;
        $estabilizador->observacoes = $request->observacoes;
        $estabilizador->protecoes = $request->protecoes;

        $estabilizador->marca()->associate($request->marca);

        $nomeArquivo = str_replace(' ', '_', $estabilizador->nome);

        $catalogo = $request->file('catalogo');
        if ($catalogo !== NULL) {
          $destinationPath = 'catalogos';
          $arquivo = $nomeArquivo.'_catalogo.'.$catalogo->getClientOriginalExtension();
          $catalogo->move($destinationPath, $arquivo);
          $estabilizador->catalogo = $arquivo;
        }

        $manual = $request->file('manual');
        if ($manual !== NULL) {
          $destinationPath = 'manuais';
          $arquivo = $nomeArquivo.'_manual.'.$manual->getClientOriginalExtension();
          $manual->move($destinationPath, $arquivo);
          $estabilizador->manual = $arquivo;
        }

        if ($estabilizador->save()) {
            if ($request->hasFile('foto_principal')) {
              $foto = $request->file('foto_principal');

              $destinationPath = 'fotos_estabilizador';
              $arquivo = $estabilizador->id.'.'.$foto->getClientOriginalExtension();
              $foto->move($destinationPath, $arquivo);

              $estabilizador->foto_principal = $arquivo;
              $estabilizador->save();              
            }

            if ($request->hasFile('fotos')) {
              $imagens = $request->file('fotos');
              $cont = 1;
              foreach($imagens as $imagem) {
                  // Salva a foto na pasta fotos
                  $destinationPath = 'fotos_estabilizador';
                  $arquivo = $estabilizador->id.'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                  $imagem->move($destinationPath, $arquivo);

                  // Cria uma nova foto e relaciona com o estabilizador
                  $foto = new FotoEstabilizador;
                  $foto->arquivo = $arquivo;
                  $estabilizador->fotos()->save($foto);
                  $foto->save();

                  $cont++;
              }
            }

            return redirect()->action('EstabilizadorController@admin');
        };
        return 'Ocorreu algum erro';
    }

    public function show($slug)
    {
        $estabilizador = Estabilizador::findBySlug($slug);
        $marca = $estabilizador->marca;

        $relacionados = Estabilizador::whereHas('marca', function($q) use ($marca) {
          $q->where('nome', $marca->nome);
        })
        ->where('id', '<>', $estabilizador->id)
        ->take(4)
        ->get();

        return view('estabilizador', compact('estabilizador', 'marca', 'relacionados'));
    }

    public function edit($id)
    {
      $estabilizador = Estabilizador::findOrFail($id);
      $marcas = Marca::all();
      return view('estabilizadores.edit', compact('estabilizador', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        $estabilizador = Estabilizador::findOrFail($id);

        $estabilizador->nome = $request->nome;
        $estabilizador->especificacao = $request->especificacao;
        $estabilizador->potencia_va = $request->potencia_va;
        $estabilizador->potencia_w = $request->potencia_w;
        $estabilizador->potencia_kva = $request->potencia_kva;
        $estabilizador->potencia_va_min = $request->potencia_va_min;
        $estabilizador->potencia_va_max = $request->potencia_va_max;
        $estabilizador->potencia_kva_min = $request->potencia_kva_min;
        $estabilizador->potencia_kva_max = $request->potencia_kva_max;
        $estabilizador->tomadas = $request->tomadas;
        $estabilizador->dimensoes = $request->dimensoes;
        $estabilizador->caracteristicas = $request->caracteristicas;
        $estabilizador->observacoes = $request->observacoes;
        $estabilizador->protecoes = $request->protecoes;

        $estabilizador->marca()->associate($request->marca);

        $nomeArquivo = str_replace(' ', '_', $estabilizador->nome);

        $catalogo = $request->file('catalogo');
        if ($catalogo !== NULL) {
          $destinationPath = 'catalogos';
          $arquivo = $nomeArquivo.'_catalogo.'.$catalogo->getClientOriginalExtension();
          $catalogo->move($destinationPath, $arquivo);
          $estabilizador->catalogo = $arquivo;
        }

        $manual = $request->file('manual');
        if ($manual !== NULL) {
          $destinationPath = 'manuais';
          $arquivo = $nomeArquivo.'_manual.'.$manual->getClientOriginalExtension();
          $manual->move($destinationPath, $arquivo);
          $estabilizador->manual = $arquivo;
        }

        if ($estabilizador->save()) {
            if ($request->hasFile('foto_principal')) {
              $foto = $request->file('foto_principal');

              $destinationPath = 'fotos_estabilizador';
              $arquivo = $estabilizador->id.'.'.$foto->getClientOriginalExtension();
              $foto->move($destinationPath, $arquivo);

              $estabilizador->foto_principal = $arquivo;
              $estabilizador->save();              
            }

            if ($request->hasFile('fotos')) {
              $imagens = $request->file('fotos');
              $cont = 1;
              
              foreach($imagens as $imagem) {
                  // Salva a foto na pasta fotos
                  $destinationPath = 'fotos_estabilizador';
                  $arquivo = $estabilizador->id.'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                  $imagem->move($destinationPath, $arquivo);

                  // Cria uma nova foto e relaciona com o estabilizador
                  $foto = new FotoEstabilizador;
                  $foto->arquivo = $arquivo;
                  $estabilizador->fotos()->save($foto);
                  $foto->save();

                  $cont++;
              }
            }

            return redirect()->action('EstabilizadorController@admin');
        };
        return 'Ocorreu algum erro';
    }

    public function destroy($id)
    {
      

      Estabilizador::destroy($id);
      return redirect()->action('EstabilizadorController@admin');
    }
}
