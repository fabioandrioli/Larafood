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
    public function test_error_register_client()
    {

        $payload = [
            'email' => 'fabio.drioli@gmail.com',
        ];

        $response = $this->postJson('/api/v1/clients/store',$payload);
       // $response->dump();

        $response->assertStatus(422);
        // ->assertExactJson([
        //     'message' => 'The given data was invalid.',
        //     'errors' => [
        //         'password' => [trans('validation.required', ['attribute' => 'password'])]
        //     ]
        // ]); Para testar tbm o retorno
    }


    public function testSuccessCreateNewClient()
    {
        $payload = [
            'name' => 'Carlos Client',
            'email' => 'carlos@client.com.br',
            'password' => '123456',
        ];

        $response = $this->postJson('/api/v1/clients/store',$payload);

        $response->assertStatus(201)
                    ->assertExactJson([
                        'data' => [
                            'name' => $payload['name'],
                            'email' => $payload['email'],
                        ]
                    ]);
    }
}
