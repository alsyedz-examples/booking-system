<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class PulseRouteTest extends TestCase
{
    /**
     * A test to see if pulse route is returns forbidden response for guest users.
     */
    public function test_pulse_route_returns_forbidden_for_guest_users(): void
    {
        $response = $this->get('/pulse');

        $response->assertForbidden();
    }

    /**
     * A test to see if pulse route is returns forbidden response for non-admin users.
     */
    public function test_pulse_route_returns_forbidden_for_non_authorized_users(): void
    {
        $response = $this->actingAs($user = User::query()->nonAdmin()->first())->get('/pulse');

        $response->assertForbidden();
    }

    /**
     * A test to see if pulse route is rendering pulse dashboard for admin users.
     */
    public function test_pulse_route_renders_pulse_dashboard_for_admin_users(): void
    {
        $response = $this->actingAs($user = User::query()->admin()->first())->get('/pulse');

        $response->assertOk();

        $response->assertViewIs('pulse::dashboard');
    }
}
