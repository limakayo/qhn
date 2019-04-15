<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
		protected $table = 'segmentos';

    public function nobreaks()
    {
      return $this->belongsToMany('App\Nobreak', 'nobreak_segmento', 'segmento_id', 'nobreak_id')->withTimestamps();
    }

    protected $hidden = array('created_at', 'updated_at', 'pivot');
}
