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
        $response = $this->get('/api/v1/token');

        $response->assertStatus(422);
    }

    public function test_auth_client()
    {
        $payload = [
            'name' => 'Fabio Gilberto',
            'email' => 'fabio.drioli@gmail.com',
            'password' => bcrypt('12345678'),
        ]

        $response = $this->get('/api/v1/token');

        $response->assertStatus(422);
    }
}
