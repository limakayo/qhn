<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'linhas';

  public function nobreaks() {
    return $this->hasMany('App\Nobreak');
  }

  protected $hidden = array('created_at', 'updated_at', 'descricao', 'caracteristicas');
}
