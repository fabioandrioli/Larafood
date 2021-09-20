<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

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
        $response->dump();
        $response->assertStatus(200);
    }
}
