<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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

        factory(Tenant::class)->create();
        $response = $this->get('/api/v1/tenants');
        // $response = $this->getJson('/api/v1/tenants'); para testar formato json

        $response->assertStatus(200);
    }
}
