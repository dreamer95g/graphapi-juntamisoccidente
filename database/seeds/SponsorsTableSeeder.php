<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::create([
            'name' => 'Patrick'
        ]);
        Sponsor::create([
            'name' => 'Dario'
        ]);
        Sponsor::create([
            'name' => 'Brasil'
        ]);
        Sponsor::create([
            'name' => 'World Serve'
        ]);
        Sponsor::create([
            'name' => 'Otro'
        ]);
        Sponsor::create([
            'name' => 'Iglesia Local'
        ]);
    }
}
