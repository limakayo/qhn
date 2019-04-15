<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use App\Nobreak;
use App\Linha;
use App\Marca;
use App\Segmento;
use App\Foto;
use App\Http\Requests;

class NobreakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nobreaks = Nobreak::all();
        return view('nobreaks', compact('nobreaks'));
    }

    public function marca($marca)
    {
      $marca = Marca::where('nome', 'like', '%'.$marca.'%')->first();
      $nobreaks = $marca->nobreaks;
      $estabilizadores = $marca->estabilizadores;
      
      return view('marca', compact('nobreaks', 'estabilizadores', 'marca'));
      //return $nobreaks;

    }

    public function segmento($slug)
    {
      $segmento = Segmento::where('slug', 'like', $slug)->first();
      $segmentos = Segmento::where('slug', 'like', $slug)->get();
      
      /*$nobreaks = Nobreak::whereHas('segmentos', function($query) use($slug) {
        $query->where('slug', 'like', '%'.$slug.'%');
      })->get();*/

      return view('segmento', compact('segmentos', 'segmento'));
    }

    public function allNobreaks() {
      //return Nobreak::with('linha', 'marca', 'segmentos')->get();
      return Nobreak::select(
        'id',
        'nome', 
        'foto_principal', 
        'potencia_va', 
        'potencia_va_min',
        'potencia_va_max',
        'potencia_kva',
        'potencia_kva_min',
        'potencia_kva_max',
        'linha_id',
        'marca_id',
        'slug',
        'potencia_w')->with('linha', 'marca','segmentos')->get();
    }

    public function nobreaks(Request $request)
    {
        return Nobreak::with('linha', 'marca', 'segmentos')
                      ->skip($request->query('skip'))
                      ->take($request->query('take'))
                      ->get();
        //$nobreaks = Nobreak::all();
        //return view('nobreaks', compact('nobreaks'));
    }

    public function admin()
    {
        $nobreaks = Nobreak::all();
        return view('nobreaks.index', compact('nobreaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $linhas = Linha::all();
        $marcas = Marca::all();
        $segmentos = Segmento::all();
        return view('nobreaks.create', compact('linhas', 'marcas', 'segmentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nobreak = new Nobreak;

        $nobreak->nome = $request->nome;
        $nobreak->especificacao = $request->especificacao;
        $nobreak->potencia_va = $request->potencia_va;
        $nobreak->potencia_va_min = $request->potencia_va_min;
        $nobreak->potencia_va_max = $request->potencia_va_max;
        $nobreak->potencia_kva = $request->potencia_kva;
        $nobreak->potencia_kva_min = $request->potencia_kva_min;
        $nobreak->potencia_kva_max = $request->potencia_kva_max;
        $nobreak->potencia_w = $request->potencia_w;
        $nobreak->tomadas = $request->tomadas;
        $nobreak->autonomia = $request->autonomia;
        $nobreak->baterias = $request->baterias;
        $nobreak->exp_bateria = $request->exp_bateria;
        $nobreak->dimensoes = $request->dimensoes;
        $nobreak->caracteristicas = $request->caracteristicas;
        $nobreak->observacoes = $request->observacoes;
        $nobreak->protecoes = $request->protecoes;
        $nobreak->modelos = $request->modelos;

        $nobreak->linha()->associate($request->linha);
        $nobreak->marca()->associate($request->marca);

        $nomeArquivo = str_replace(' ', '_', $nobreak->nome);

        $catalogo = $request->file('catalogo');
        if ($catalogo !== NULL) {
          $destinationPath = 'catalogos';
          $arquivo = $nomeArquivo.'_catalogo.'.$catalogo->getClientOriginalExtension();
          $catalogo->move($destinationPath, $arquivo);
          $nobreak->catalogo = $arquivo;
        }

        $manual = $request->file('manual');
        if ($manual !== NULL) {
          $destinationPath = 'manuais';
          $arquivo = $nomeArquivo.'_manual.'.$manual->getClientOriginalExtension();
          $manual->move($destinationPath, $arquivo);
          $nobreak->manual = $arquivo;
        }

        if ($nobreak->save()) {
            if ($request->segmentos) {
              foreach($request->segmentos as $segmento) {
                $nobreak->segmentos()->attach($segmento);
              }
            }

            if ($request->hasFile('foto_principal')) {
              $foto = $request->file('foto_principal');

              $destinationPath = 'fotos';
              $arquivo = $nobreak->id.'.'.$foto->getClientOriginalExtension();
              $foto->move($destinationPath, $arquivo);

              $nobreak->foto_principal = $arquivo;
              $nobreak->save();              
            }

            if ($request->hasFile('fotos')) {
              $imagens = $request->file('fotos');
              $cont = 1;
              foreach($imagens as $imagem) {
                  // Salva a foto na pasta fotos
                  $destinationPath = 'fotos';
                  $arquivo = $nobreak->id.'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                  $imagem->move($destinationPath, $arquivo);

                  // Cria uma nova foto e relaciona com o nobreak
                  $foto = new Foto;
                  $foto->arquivo = $arquivo;
                  $nobreak->fotos()->save($foto);
                  $foto->save();

                  $cont++;
              }
            }

            return redirect()->action('NobreakController@admin');
        };
        return 'Ocorreu algum erro';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $nobreak = Nobreak::findBySlug($slug);
        $linha = $nobreak->linha;
        $marca = $nobreak->marca;

        $relacionados = Nobreak::whereHas('linha', function($q) use ($linha) {
          $q->where('nome', $linha->nome);
        })->whereHas('marca', function($q) use ($marca) {
          $q->where('nome', $marca->nome);
        })
        ->where('id', '<>', $nobreak->id)
        ->take(4)
        ->get();

        return view('nobreak', compact('nobreak', 'linha', 'marca', 'relacionados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $nobreak = Nobreak::findOrFail($id);
      $segmentosNobreak = $nobreak->segmentos;
      $linhas = Linha::all();
      $marcas = Marca::all();
      $segmentos = Segmento::all();
      $segmentosSelecionados = array();
      foreach ($segmentosNobreak as $segmento) {
        array_push($segmentosSelecionados, $segmento->id);
      }

      return view('nobreaks.edit', compact('nobreak', 'linhas', 'marcas', 'segmentos', 'segmentosSelecionados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nobreak = Nobreak::findOrFail($id);

        $nobreak->nome = $request->nome;
        $nobreak->especificacao = $request->especificacao;
        $nobreak->potencia_va = $request->potencia_va;
        $nobreak->potencia_va_min = $request->potencia_va_min;
        $nobreak->potencia_va_max = $request->potencia_va_max;
        $nobreak->potencia_kva = $request->potencia_kva;
        $nobreak->potencia_kva_min = $request->potencia_kva_min;
        $nobreak->potencia_kva_max = $request->potencia_kva_max;
        $nobreak->potencia_w = $request->potencia_w;
        $nobreak->tomadas = $request->tomadas;
        $nobreak->autonomia = $request->autonomia;
        $nobreak->baterias = $request->baterias;
        $nobreak->exp_bateria = $request->exp_bateria;
        $nobreak->dimensoes = $request->dimensoes;
        $nobreak->caracteristicas = $request->caracteristicas;
        $nobreak->observacoes = $request->observacoes;
        $nobreak->protecoes = $request->protecoes;
        $nobreak->modelos = $request->modelos;

        $nobreak->linha()->associate($request->linha);
        $nobreak->marca()->associate($request->marca);

        $nomeArquivo = str_replace(' ', '_', $nobreak->nome);

        $catalogo = $request->file('catalogo');
        if ($catalogo !== NULL) {
          $destinationPath = 'catalogos';
          $arquivo = $nomeArquivo.'_catalogo.'.$catalogo->getClientOriginalExtension();
          $catalogo->move($destinationPath, $arquivo);
          $nobreak->catalogo = $arquivo;
        }

        $manual = $request->file('manual');
        if ($manual !== NULL) {
          $destinationPath = 'manuais';
          $arquivo = $nomeArquivo.'_manual.'.$manual->getClientOriginalExtension();
          $manual->move($destinationPath, $arquivo);
          $nobreak->manual = $arquivo;
        }

        if ($nobreak->save()) {
            $nobreak->segmentos()->detach();

            if ($request->segmentos) {
              foreach($request->segmentos as $segmento) {
                $nobreak->segmentos()->attach($segmento);
              }
            }

            if ($request->hasFile('foto_principal')) {
              $foto = $request->file('foto_principal');

              File::delete('fotos/'.$nobreak->foto_principal);

              $destinationPath = 'fotos';
              $arquivo = $nobreak->id.'.'.$foto->getClientOriginalExtension();
              $foto->move($destinationPath, $arquivo);

              $nobreak->foto_principal = $arquivo;
              $nobreak->save();              
            }

            if ($request->hasFile('fotos')) {
              $imagens = $request->file('fotos');
              foreach($nobreak->fotos as $foto) {
                File::delete('fotos/'.$foto->arquivo);
              }
              $cont = 1;
              foreach($imagens as $imagem) {
                  // Salva a foto na pasta fotos
                  $destinationPath = 'fotos';
                  $arquivo = $nobreak->id.'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                  $imagem->move($destinationPath, $arquivo);

                  // Cria uma nova foto e relaciona com o nobreak
                  $foto = new Foto;
                  $foto->arquivo = $arquivo;
                  $nobreak->fotos()->save($foto);
                  $foto->save();

                  $cont++;
              }
            }

            return redirect()->action('NobreakController@admin');
        };
        return 'Ocorreu algum erro';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $nobreak = Nobreak::findOrFail($id);
      foreach($nobreak->fotos as $foto) {
        File::delete('fotos/'.$foto->arquivo);
      }
      File::delete('fotos/'.$nobreak->foto_principal);

      Nobreak::destroy($id);
      return redirect()->action('NobreakController@admin');
    }
}
