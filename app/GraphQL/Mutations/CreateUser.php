<?php

namespace App\GraphQL\Mutations;

use App\User;

class CreateUser
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $password = bcrypt($args['password']);
        $username = $args['name'];
        $email = $args['email'];

        $data = array(
            'name' => $username,
            'email' => $email,
            'password' => $password
        );

        $user = User::create($data);

        return $user;
    }
}
