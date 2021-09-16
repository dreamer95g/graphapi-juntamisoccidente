<?php

namespace App\Models\Nomenclators;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsor extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer
    // public $transformer = SponsorTransformer::class;

    protected $table = 'sponsors';

    protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [
        'name',
    ];

    public function payrolls()
    {
        return $this->belongsToMany(Payroll::class);
    }
}
