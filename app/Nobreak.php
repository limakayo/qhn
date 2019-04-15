<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Nobreak extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nobreaks';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nome'
            ]
        ];
    }

    public function segmentos()
    {
      return $this->belongsToMany('App\Segmento', 'nobreak_segmento', 'nobreak_id', 'segmento_id')->withTimestamps();
    }

    public function linha()
    {
      return $this->belongsTo('App\Linha');
    }

    public function marca()
    {
      return $this->belongsTo('App\Marca');
    }

    public function fotos()
    {
      return $this->hasMany('App\Foto');
    }
}
