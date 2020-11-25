<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function not_authenticated_user_can_not_see_all_users()
    {
        $response = $this->get(route('users.index'));
        //$response->abort(403);
        $response->assertRedirect('home');
    }

    /**
     * @test
     */
    public function authenticated_admin_user_can_see_all_users()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create(['admin_since'=>now()]);

        $response = $this->actingAs($user)->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
    }
}
