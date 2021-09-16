<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        'App\Models\Nomenclators\Church' => 'App\Policies\Nomenclators\ChurchPolicy',
        'App\Models\Nomenclators\Department' => 'App\Policies\Nomenclators\DepartmentPolicy',
        'App\Models\Nomenclators\District' => 'App\Policies\Nomenclators\DistrictPolicy',
        'App\Models\Nomenclators\Language' => 'App\Policies\Nomenclators\LanguagePolicy',
        'App\Models\Nomenclators\Level' => 'App\Policies\Nomenclators\LevelPolicy',
        'App\Models\Nomenclators\Mission' => 'App\Policies\Nomenclators\MissionPolicy',
        'App\Models\Nomenclators\Role' => 'App\Policies\Nomenclators\RolePolicy',
        'App\Models\Nomenclators\Sponsor' => 'App\Policies\Nomenclators\SponsorPolicy',

        'App\Models\Payroll\Payroll' => 'App\Policies\Payroll\PayrollPolicy',
        'App\Models\Payroll\Concept' => 'App\Policies\Payroll\ConceptPolicy',
        'App\Models\Payroll\Sunday' => 'App\Policies\Payroll\SundayPolicy',

        'App\Models\Curriculum\Curriculum' => 'App\Policies\Curriculum\CurriculumPolicy',
        'App\Models\Media\Image' => 'App\Policies\Media\ImagePolicy',

        'App\User' => 'App\Policies\UserPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // PARA LA AUTORIZACION
        $this->registerPolicies();

        // LAS RUTAS DE PASSPORT
        Passport::routes();
    }
}
