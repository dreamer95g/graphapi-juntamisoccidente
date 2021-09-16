<?php

namespace App\Models\Nomenclators;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'name'
    ];

    protected $fillable = [
        'name', 'token'
    ];

    //relaciones
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
