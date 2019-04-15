<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function() {
  Route::auth();
  Route::get('/admin/nobreaks', 'NobreakController@admin')->name('admin.nobreaks.index');
  Route::get('/admin/nobreaks/create', 'NobreakController@create')->name('admin.nobreaks.create');
  Route::get('/admin/nobreaks/{nobreaks}/edit', 'NobreakController@edit')->name('admin.nobreaks.edit');
  Route::delete('/admin/nobreaks/{nobreaks}', 'NobreakController@destroy')->name('admin.nobreaks.destroy');

  Route::get('/admin/estabilizadores', 'EstabilizadorController@admin')->name('admin.estabilizadores.index');
  Route::get('/admin/estabilizadores/create', 'EstabilizadorController@create')->name('admin.estabilizadores.create');
  Route::get('/admin/estabilizadores/{estabilizadores}/edit', 'EstabilizadorController@edit')->name('admin.estabilizadores.edit');
  Route::delete('/admin/estabilizadores/{estabilizadores}', 'EstabilizadorController@destroy')->name('admin.estabilizadores.destroy');

  Route::get('/admin/geradores', 'GeradorController@admin')->name('admin.geradores.index');
  Route::get('/admin/geradores/create', 'GeradorController@create')->name('admin.geradores.create');
  Route::get('/admin/geradores/{geradores}/edit', 'GeradorController@edit')->name('admin.geradores.edit');
  Route::delete('/admin/geradores/{geradores}', 'GeradorController@destroy')->name('admin.geradores.destroy');

  Route::resource('/admin/linhas', 'LinhaController');
  Route::resource('/admin/marcas', 'MarcaController');
  Route::resource('/admin/segmentos', 'SegmentoController');
  Route::get('/admin', function() {
    return view('admin');
  })->name('admin');
});

Route::group(['middleware' => 'cors'], function() {
  Route::get('/api/nobreaks', 'NobreakController@nobreaks');
  Route::get('/api/allnobreaks', 'NobreakController@allNobreaks');
  Route::get('/api/estabilizadores', 'EstabilizadorController@estabilizadores');
  Route::get('/api/marcas', 'MarcaController@marcas');
  Route::get('/api/segmentos', 'SegmentoController@segmentos');
  Route::get('/api/linhas', 'LinhaController@linhas');
});

Route::post('/cotacao', 'ContatoController@cotacao');
Route::post('/contato', 'ContatoController@contato');

Route::group(['middleware' => 'web'], function() {

  Route::get('nobreaks-page', function() {
    return view('_partials/nobreaks');
  });

  Route::get('estabilizadores-page', function() {
  	return view ('_partials/estabilizadores');
  });

  Route::resource('nobreaks', 'NobreakController');
  Route::resource('estabilizadores', 'EstabilizadorController');
  Route::resource('geradores', 'GeradorController');

  // SEGMENTOS
  Route::get('solucoes-para-{segmento}', 'NobreakController@segmento')->name('segmento');

  // MARCAS
  Route::get('nobreaks-{marca}', 'NobreakController@marca')->name('marca');

  Route::get('/', function () {
      return view('index');
  })->name('index');

  Route::get('quem-somos', function() {
  		return view('quem-somos');
  })->name('quem-somos');

  Route::get('servicos', function() {
  		return view('servicos');
  })->name('servicos');

  Route::get('contato', function() {
  		return view('contato');
  })->name('contato');

  /*Route::get('blog', function() {
  		return view('blog');
  })->name('blog');*/
  Route::auth();

  Route::get('/home', 'HomeController@index');
});
