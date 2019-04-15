<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'marcas';

  public function nobreaks() {
    return $this->hasMany('App\Nobreak')->select(
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
      'potencia_w')->with('linha', 'marca','segmentos');
  }

  public function estabilizadores() {
  	return $this->hasMany('App\Estabilizador');
  }

  protected $hidden = array('created_at', 'updated_at');
}
