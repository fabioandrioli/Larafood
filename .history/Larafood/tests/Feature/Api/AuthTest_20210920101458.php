<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_validation_auth()
    {
        $response = $this->get('/api/v1//sanctum/token');

        $response->assertStatus(422);
    }

    public function test_auth_client()
    {
        $payload = [
            'email' => 'fabio.drioli@gmail.com',
            'password' => '12345678',
            'device_name' => '  Xaiomi',
        ];

        $response = $this->get('/api/v1//sanctum/token');

        $response->assertStatus(422);
    }
}
