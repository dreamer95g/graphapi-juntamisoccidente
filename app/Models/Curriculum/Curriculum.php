<?php

namespace App\Models\Curriculum;

use App\Models\Media\Image;
use App\Models\Nomenclators\Language;
use App\Models\Nomenclators\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Curriculum extends Model
{
    use SoftDeletes;

    const IS_MAN = '1';
    const IS_WOMAN = '0';

    protected $table = 'curricula';

    protected $dates = ['deleted_at'];


    protected $fillable = [

        'dni',
        'name',
        'sex',
        'profession',
        'nationality',
        'graduation_place',
        'adress',
        'academic_formation',
        'work_experience',
        'vision_goals',
        'conv_experience',
        'level_id',
        'language_id'

    ];


    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }
}
