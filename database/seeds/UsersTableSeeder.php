<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gabry',
            'email' => 'gabry95g@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("secret"), // secret
            'remember_token' => "hbE47u5sNFjDSbQvViQCYOLeOdTPhUmYXMTRBNHZ",
        ]);

        User::create([
            'name' => 'Yami',
            'email' => 'yami@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt("secret"), // secret
            'remember_token' => "hbE47u5sNFjDSbQvViQCYOLeOdTPhUmYXMTRBNHZ",
        ]);

        //ASIGNARLE LOS ROLES
        DB::insert(' insert into role_user (role_id, user_id) values (?, ?) ', [1, 1]);
        DB::insert(' insert into role_user (role_id, user_id) values (?, ?) ', [2, 2]);
    }
}
