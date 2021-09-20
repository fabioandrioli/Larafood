<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_client()
    {

        $payload = [
            'email' => 'fabio.drioli@gmail.com',
        ];

        $response = $this->postJson('/api/v1/clients/store');
        $response->dump();

        $response->assertStatus(422);
    }
}
