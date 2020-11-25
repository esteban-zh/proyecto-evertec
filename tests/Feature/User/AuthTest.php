<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_client_can_view_register_form()
    {
        // Act
        $response = $this->get('/register');

        // Assert
        $response->assertOk();
        $response->assertViewIs('auth.register');
    }

    /** @test */
    public function a_client_can_register()
    {
        //  Act
        $response = $this->post('/register', [
            'name' => 'Esteban',
            'email' => 'eszahe302@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert
        $user = User::orderBy('id', 'desc')->first();
        $this->assertEquals('Esteban', $user->name);
        $this->assertEquals('eszahe302@gmail.com', $user->email);
        $this->assertTrue(Hash::check('password', $user->password));
        $response->assertRedirect('/home');
    }

    /** @test */
    public function register_error_mail_format_pass()
    {
        $response = $this->post('/register', [
            'name' => 'Esteban',
            'email' => 'eszahe302gmailcom',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert
        $response->assertRedirect();
        
    }

    /** @test */
    public function register_error_confirm_pass()
    {
        // Act
        $response = $this->post('/register', [
            'name' => 'Esteban',
            'email' => 'eszahe302@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'incorrect-password',
        ]);

        // Assert
        $response->assertRedirect();
    }

    /** @test */
    public function a_client_can_view_login_form()
    {
        // Act
        $response = $this->get('/login');

        // Assert
        $response->assertOk();
        $response->assertViewIs('auth.login');
    }
     /** @test */
     public function an_authenticated_user_cannot_view_login_form()
    {
        // Arrange
        $user = factory(User::class)->make();

        // Assert
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }

    /** @test */
    public function an_user_can_login_with_correct_credentials()
    {
        // Arrange
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'password'),
        ]);

        // Act
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert
        $response->assertRedirect();
        $this->assertAuthenticatedAs($user);
    }
}