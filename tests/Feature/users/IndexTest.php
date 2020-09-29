<?php

namespace Tests\Feature\users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @test void
     */
    public function can_see_all_users()
    {
        $this->withoutExceptionHandling();
        $user = factory('App\User')->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
    }
}
