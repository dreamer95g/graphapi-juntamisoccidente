<?php

use Illuminate\Database\Seeder;
use App\Models\Nomenclators\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'token' => '$2y$10$1n02Qlz2N5M2MML60fRqCubfbroi1CO4nLFx33IbZciMInZzDAbaW'
        ]);
        Role::create([
            'name' => 'secretary',
            'token' => '$2y$10$5sstp4sskHqVm./ZMISeYe7QDAVDJN2QWm1g/X0fP.VJQsbkTz6/C'
        ]);
        Role::create([
            'name' => 'coordinator',
            'token' => '$2y$10$2uZZB5FSvmuNTrx9deELFOI8Khd/y2zWEAmwd4rxIOjUakoG.h2UC'
        ]);
        Role::create([
            'name' => 'partner',
            'token' => '$2y$10$m9qp/J3COwW25eNp6LPgiu0oEotHn9xIlad2IaefBHCopEKMqpwr6'
        ]);

        Role::create([
            'name' => 'missionary',
            'token' => '$2y$10$2zo4lNFoD1englv2QBgMveUFCQ6ic9c3beuR4ieOuYsDQQNxGYXvW'
        ]);

        Role::create([
            'name' => 'guest',
            'token' => '$2y$10$vLZ2.HEUKs/6DfV/pJ7MCOKI2YmXumMW7Ek12cGsh7WTnMefASnYu'
        ]);
    }
}
