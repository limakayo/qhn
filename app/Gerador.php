<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Gerador extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'geradores';

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
}
