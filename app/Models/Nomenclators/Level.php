<?php

namespace App\Models\Nomenclators;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer
    // public $transformer = LevelTransformer::class;

    protected $table = 'levels';

    protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [
        'name',
    ];

    // public function curriculum()
    // {
    //     return $this->hasMany(Curriculum::class);
    // }
}
