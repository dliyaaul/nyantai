<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCanShowRolePage()
    {
        $user = User::role('admin')->get()->random();
        $this->actingAs($user);
        $this->get('/roles')->assertOk();
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }

    public function testCannotShowRolePage()
    {
        $user = User::role('subadmin1')->get()->random();
        $this->actingAs($user);
        $this->get('/roles')->assertStatus(403);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
