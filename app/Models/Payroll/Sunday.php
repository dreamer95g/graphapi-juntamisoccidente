<?php

namespace App\Models\Payroll;

use App\Models\Nomenclators\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sunday extends Model
{
    use SoftDeletes;

    //asociar el modelo a su transformer //
    //public $transformer = SundayTransformer::class;

    protected $table = 'sundays';

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'pivot'
    ];

    protected $fillable = [
        's1',
        's2',
        's3',
        's4',
        'department_id'
    ];


    public function payrolls(): BelongsToMany
    {
        return $this->belongsToMany(Payroll::class);
    }


    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
