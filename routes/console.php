<?php

Artisan::command('user', function () {
    \App\User::create([
        'name' => 'Gabriel Suarez',
        'email' => 'gabry95g@gmail.com',
        'password' => bcrypt('secret')
    ]);
})->describe('Create sample user');
