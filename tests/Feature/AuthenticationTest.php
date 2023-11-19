<?php

namespace Tests\Feature;

use App\Models\AccessToken;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * Test the login screen.
     * @return void
     */
    public function test_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Used to check user authenticateion
     * @return void
     */

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();
 
        $response = $this->post('api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]); 
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    /**
     * Used to logout
     * @return void
     */
    public function test_logout(){

        $user = User::factory()->create();
        $res = $this->post('api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $content = json_decode($res->getContent(),true);
        $token = $content['access_token'];        
        $response = $this->post("api/logout",['access_token'=>$token],['Authorization'=>$token]);
        $response->assertStatus(200);
    }
}
