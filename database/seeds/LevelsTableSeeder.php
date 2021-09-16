<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Superior'
        ]);
        Level::create([
            'name' => '12 Grado'
        ]);
        Level::create([
            'name' => '9no Grado'
        ]);
    }
}
