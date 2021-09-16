<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\Nomenclators\Church;
use App\User;


class ChurchMutationsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_create_a_church()
    {
        //prepare
        $user = factory(User::class)->create();
        Passport::actingAs($user);
        //execute
        $response = $this->graphQL('
            mutation{
             createChurch(name:"Centro Habana"){
              id
              name
             }
           }
        ');
        //assert
        $response->assertJson([
            'data' => []

        ]);
    }
}
