<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;
use Illuminate\Support\Str;


class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_validation_auth()
    {
        $response = $this->postJson('/api/v1/sanctum/token');

        $response->assertStatus(422);
    }

    public function test_auth_error_client()
    {
        $payload = [
            'email' => 'fabio.drioli@gmail.com',
            'password' => '12345678',
            'device_name' => '  Xaiomi',
        ];

        $response = $this->postJson('/api/v1/sanctum/token',$payload);

        $response->assertStatus(404);
    }

    public function test_auth_success_client()
    {

        $client = Client::factory()->create();
      
        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => '  Xaiomi',
        ];

        $response = $this->postJson('/api/v1/sanctum/token',$payload);
        //$response->dump();
        $response->assertStatus(200)
                 ->assertJsonStructure(['token']);
    }


    public function test_auth_erro_me()
    {
      

        $response = $this->getJson('/api/v1/auth/me');
        $response->dump();
        $response->assertStatus(401);
    }

    public function test_auth_success_me()
    {

        $client = Client::factory()->create();

        $token = $client->createToken(Str::random(10))->plainTextToken;

        $response = $this->getJson('/api/v1/auth/me',[
            "Authorization" => "Bearer {$token}"
        ]);
        $response->dump();
        $response->assertStatus(401);
    }
}
