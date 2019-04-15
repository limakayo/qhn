<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Linha;
use App\Http\Requests;

class LinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linhas = Linha::all();
        return view('linhas.index', compact('linhas'));
    }

    public function linhas()
    {
      return Linha::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('linhas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $linha = new Linha;
        $linha->nome = $request->nome;
        if ($linha->save()) {
            return redirect()->action('LinhaController@index');
        };
        return 'Ocorreu algum erro';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('linhas.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $linha = Linha::findOrFail($id);
        return view('linhas.edit', compact('linha'));
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
      $linha = Linha::findOrFail($id);
      $linha->nome = $request->nome;
      if ($linha->save()) {
          return redirect()->action('LinhaController@index');
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
        Linha::destroy($id);
        return redirect()->action('LinhaController@index');
    }
}
