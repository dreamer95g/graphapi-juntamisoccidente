<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'Español'
        ]);
        Language::create([
            'name' => 'Ingles'
        ]);
    }
}
