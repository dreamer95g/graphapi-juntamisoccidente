<?php

namespace App\Models\Nomenclators;

use App\Models\Payroll\Payroll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer
    // public $transformer = DistrictTransformer::class;

    protected $table = 'districts';

    protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [
        'name',
    ];

    //relaciones
    public function payroll()
    {
        return $this->hasOne(Payroll::class);
    }
}
