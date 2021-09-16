<?php

namespace App\Models\Nomenclators;

use App\Models\Curriculum\Curriculum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer
    // public $transformer = LanguageTransformer::class;

    protected $table = 'languages';

    protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [
        'name',
    ];

    public function curriculum()
    {
        return $this->hasMany(Curriculum::class);
    }
}
