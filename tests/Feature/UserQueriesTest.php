<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserQueriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_me()
    {
        //prepare
        $user = factory(User::class)->create();
        Passport::actingAs($user);

        //execute
        $response = $this->graphQL('
            query {
               me {
              id
             name
            email
                }
          }
        ');

        //assert
        $response->assertJson([
            'data' => [
                'me' => []
            ]
        ]);
    }

    public function test_users()
    {
        //prepare
        $user = factory(User::class)->create();
        Passport::actingAs($user);

        //execute
        $response = $this->graphQL('
            query {
  users {
    id
    name
    email
  }
}
        ');

        //assert
        $response->assertJson([
            'data' => [
                'users' => []
            ]
        ]);
    }
}
