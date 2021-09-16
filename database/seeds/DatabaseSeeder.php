<?php

use App\Models\Curriculum\Curriculum;
use App\Models\Nomenclators\Mission;
use App\Models\Nomenclators\Sponsor;
use App\Models\Payroll\Concept;
use App\Models\Payroll\Payroll;
use App\Models\Payroll\Sunday;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        //user
        User::truncate();
        //esto es para que no me escriba los
        // datos del correo en los logs
        //esto es porque el modelo usuarios se usa en varias clases
        User::flushEventListeners();

        // $this->call(ChurchesTableSeeder::class);
        // $this->call(DepartmentsTableSeeder::class);
        //$this->call(DistrictsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        //$this->call(MissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        // $this->call(SponsorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);


        //curriculum
        //factory(Curriculum::class, 5)->create();

        // //Sunday
        // factory(Sunday::class, 10)->create();

        // //payroll
        // factory(Concept::class, 5)->create();

        // //esto es para llenar el n*n
        // factory(Payroll::class, 5)->create()->each(
        //     function ($payroll) {
        //         $sunday = Sunday::all()->random(mt_rand(1, 10))->pluck('id');
        //         $mission = Mission::all()->random(mt_rand(1, 5))->pluck('id');
        //         $sponsor = Sponsor::all()->random(mt_rand(1, 5))->pluck('id');

        //         $payroll->sundays()->attach($sunday);
        //         //$payroll->mission()->attach($mission);
        //         $payroll->sponsors()->attach($sponsor);
        //     }
        // );
    }
}
