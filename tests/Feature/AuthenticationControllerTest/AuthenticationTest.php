<?php

namespace Tests\Feature\AuthenticationControllerTest;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{   
    public function testAccessingAuthenticationMethodAsUser()
    {
        $this->actingAs(User::factory()->create())
            ->get('login')
            ->assertRedirect('home');
    }

    public function testAccessingAuthenticationMethodasGuest()
    {
        $this->get('login')
            ->assertStatus(200)
            ->assertViewIs('login');
    }

    public function testLogoutMethodAsGuest()
    {
        $this->get('logout')->assertRedirect('login');
    }

    public function testLogoutMethodAsUser()
    {
   
        $this->actingAs(User::factory()->create())
                ->get('logout')->assertRedirect('login');
        
        $this->assertTrue(auth()->guest());
    }
}
