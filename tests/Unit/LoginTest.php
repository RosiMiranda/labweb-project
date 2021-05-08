<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Foundation\Testing\RefreshDatabase;



class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_visit_page_of_login()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('Inicio sesión');
    }

/** @test */
    public function authenticated_to_a_user()
    {
         //RefreshDatabase;

        $role = factory('App\Role')->create(["role"=> 2]);

        $user = factory('App\User')->create(["name" => "lia", "email" => "user@mail.com", "password" => "secret", "address" => "Mi casa", "role_id"=>$role->id]);

        $this->get('/login')->assertSee('Inicio sesión');
        $credentials = [
            "email" => "user@mail.com",
            "password" => "secret"
        ];

       
        $response = $this->post('/login', $credentials);
       
       
    }

    /** @test */
    public function not_authenticate_to_a_user_with_credentials_invalid()
    {

        $role = factory('App\Role')->create(["role"=> 2]);

        $user = factory('App\User')->create(["name" => "lia", "email" => "user@mail.com", "password" => "secret", "address" => "Mi casa", "role_id"=>$role->id]);
        
        $credentials = [
            "email" => "users@mail.com",
            "password" => "secret"
        ];

        $this->assertInvalidCredentials($credentials);
    }

   

    /** @test */
    public function the_password_match()
    {
        $user = ["name" => "lia", "email" => "user@mail.com", "password" => "secret", "address" => "Mi casa", "role_id"=> 2];
        
        $credentials = [
            "email" => "zaratedev@gmail.com",
            "password" => null
        ];

        $response = $this->from('/register')->post('/doRegister', $user);
        $response->assertRedirect('/register')
            ->assertSessionHasErrors([
                'password' => 'The password confirmation does not match.',
            ]);

    }
}
