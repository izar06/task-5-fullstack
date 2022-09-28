<?php

namespace Tests\Unit;

use Tests\TestCase as TestsTestCase;

class AuthTest extends TestsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_register_page()
    {
        $this->withoutExceptionHandling();
        $this->get('register')->assertStatus(200);
    }

    public function test_login_page()
    {
        $this->withoutExceptionHandling();
        $this->get('login')->assertStatus(200);
    }

    public function test_login_redirect_to_dashboard()
    {
        $this->post('/login', [
            'email' => 'izar.anam22@gmail.com',
            'password' => '12345678',
        ])
        ->assertRedirect('/home');
    }
}
