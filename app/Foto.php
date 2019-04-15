<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fotos';

    public function nobreak() {
      return $this->belongsTo('App\Nobreak');
    }
}
