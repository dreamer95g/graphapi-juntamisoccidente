<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'name' => 'Habana'
        ]);

        District::create([
            'name' => 'Matanzas'
        ]);
    }
}
