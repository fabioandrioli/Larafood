<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Models\Tenant;

class TenantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_tenants()
    {

        Tenant::factory()->count(10)->create(); //criar 10 tenats
        $response = $this->get('/api/v1/tenants');
       // $response->dump();
        // $response = $this->getJson('/api/v1/tenants'); para testar formato json

        $response->assertStatus(200)
                ->assertJsonCount(10,'data');
    }


    public function test_error_get_tenant(){
        $tenant = Tenant::factory()->create();

        $response = $this->get("/api/v1/tenants/{$tenant->uuid}");

        $response->assertStatus(200);

    }

    public function test_by_identify(){
        $tenant = "fake_value";

        $response = $this->get("/api/v1/tenants/{$tenant}");

        $response->assertStatus(404);

    }
}
