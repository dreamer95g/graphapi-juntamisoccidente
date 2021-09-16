<?php

namespace App\Models\Payroll;

use App\Models\Curriculum\Curriculum;
use App\Models\Nomenclators\Church;
use App\Models\Nomenclators\District;
use App\Models\Nomenclators\Mission;
use App\Models\Nomenclators\Sponsor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use SoftDeletes;

    const IS_PASTOR = '1';

    const IS_MISSIONARY = '0';

    //asociar el modelo a su transformer
    //public $transformer = PayrollTransformer::class;

    protected $table = 'payrolls';

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'pivot'
    ];

    protected $fillable = [

        'title',
        'subtitle',
        'year',
        'month',
        'pastor',
        'district_id',
        'church_id',
        'mission_id',
        'concept_id',
        'curriculum_id'

    ];

    //relaciones 1*n
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function curriculum(): BelongsTo
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class);
    }


    public function concept(): BelongsTo
    {
        return $this->belongsTo(Concept::class);
    }

    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class);
    }
    //n*n
    public function sundays(): BelongsToMany
    {
        return $this->belongsToMany(Sunday::class);
    }


    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class);
    }
}
