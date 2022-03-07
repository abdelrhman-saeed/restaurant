<?php

namespace Tests\Feature\UserControllerTest;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreMethodTest extends TestCase
{
    use RefreshDatabase;

    public function testStoringAsGuest()
    {
        $this->post('users')->assertRedirect('login');
    }

    public function testStoringAsUser()
    {
        $this->assertEquals(0, User::count());

        $response = $this->actingAs(User::factory()->create())
            ->post('users', [
                'name' => 'ahmed',
                'email' => 'ahmed@gmail.com',
                'password' => 'ahmedahmed',
                'password_confirmation' => 'ahmedahmed'
            ]);

        $this->assertEquals(2, User::count());
        $this->assertTrue( auth()->user()->is(User::where('email', 'ahmed@gmail.com')->first()) );
        $response->assertRedirect('home');


    }
    public function testIfUserCredentialsAreInvalid()
    {
        $this->post('users')->assertRedirect();
    }
}
