<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Church;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Church::create([
            'name' => 'Centro Habana'
        ]);
        Church::create([
            'name' => 'San Antonio'
        ]);
        Church::create([
            'name' => 'La Lisa'
        ]);
        Church::create([
            'name' => 'Guanabacoa'
        ]);
        Church::create([
            'name' => 'Electrico'
        ]);
        Church::create([
            'name' => 'Poey'
        ]);
    }
}
