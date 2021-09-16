<?php

namespace App\Models\Nomenclators;

use App\Models\Payroll\Sunday;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer
    // public $transformer = DepartmentTransformer::class;

    protected $table = 'departments';

    protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [
        'name',
    ];

    // public function sundays()
    // {
    //     return $this->hasMany(Sunday::class);
    // }
}
