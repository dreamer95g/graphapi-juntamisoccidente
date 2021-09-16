<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Hombres'
        ]);
        Department::create([
            'name' => 'Damas'
        ]);
        Department::create([
            'name' => 'Jovenes'
        ]);
        Department::create([
            'name' => 'Juveniles'
        ]);
        Department::create([
            'name' => 'Niños'
        ]);
    }
}
