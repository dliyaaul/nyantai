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

    public function testCannotShowRoleNotLogin()
    {
        $this->get('roles')->assertRedirect('login')->assertStatus(302);
    }

    public function testCanCreateRole()
    {
        $user = User::role('admin')->get()->random();
        $this->actingAs($user);
        $this->get('/roles/create')->assertOk();
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }

    public function testCannotCreateRole()
    {
        $user = User::role('subadmin1')->get()->random();
        $this->actingAs($user);
        $this->get('/roles/create')->assertStatus(403);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }

    public function testCannotCreateNotLogin()
    {
        $this->get('roles/create')->assertRedirect('login')->assertStatus(302);
    }
}
