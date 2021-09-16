<?php

namespace App\Models\Nomenclators;

use App\Models\Payroll\Payroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mission extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer
    // public $transformer = MissionTransformer::class;

    protected $table = 'missions';

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
