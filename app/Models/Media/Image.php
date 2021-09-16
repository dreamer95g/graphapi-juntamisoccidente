<?php

namespace App\Models\Media;

use App\Models\Curriculum\Curriculum;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    // use SoftDeletes;

    //asociar el modelo a su transformer
    //public $transformer = ImageTransformer::class;

    protected $table = 'images';

    // protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [
        'name',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function curricula(): BelongsToMany
    {
        return $this->belongsToMany(Curriculum::class);
    }
}
