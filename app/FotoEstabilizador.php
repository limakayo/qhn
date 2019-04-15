<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoEstabilizador extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fotos_estabilizador';

    public function estabilizador() {
      return $this->belongsTo('App\Estabilizador');
    }
}
