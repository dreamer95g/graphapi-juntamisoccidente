<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Mission;

class MissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mission::create([
            'name' => '250'
        ]);
        Mission::create([
            'name' => 'Abel Santa Maria'
        ]);
        Mission::create([
            'name' => 'Puentes Grandes'
        ]);
        Mission::create([
            'name' => 'Habana Vieja'
        ]);
        Mission::create([
            'name' => 'No tiene'
        ]);
    }
}
