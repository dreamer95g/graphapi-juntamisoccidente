<?php

namespace App\Models\Payroll;

use App\Transformers\ConceptTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concept extends Model
{
    use SoftDeletes;

    protected $table = 'concepts';

    protected $dates = ['deleted_at'];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $fillable = [

        'current_membership',
        'congregants_count',
        'cells_count',
        'missions_count',
        'baptism_candidates',
        'baptism',
        'new_believers_discipled',
        'trained_leaders',
        'founded_cells',
        'founded_missions',
        'founded_churches',
        'evangelistic_visits',
        'discipleship_visits',
        'building_visits',
        'faith_professions',
        'reconciled_brothers',
        'ministered_lives',
        'cults_held'

    ];
}
