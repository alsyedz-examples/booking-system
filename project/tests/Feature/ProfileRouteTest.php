<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ProfileRouteTest extends TestCase
{
    /**
     * A test to see if profile route is redirecting to login show route for guest users.
     */
    public function test_profile_route_redirects_to_login_route_for_guest_users(): void
    {
        $response = $this->get('/profile');

        $response->assertRedirectToRoute('login.form');
    }

    /**
     * A test to see if profile route is rendering login view for guest users.
     */
    public function test_profile_route_renders_login_view_for_guest_users(): void
    {
        $response = $this->followingRedirects()->get('/profile');

        $response->assertViewIs('login');

        $response->assertSee([
            'input',
            'name="email"',
            'type="email"',
        ], false);

        $response->assertSee([
            'input',
            'name="password"',
            'type="password"',
        ], false);
    }

    /**
     * A test to see if profile route is rendering profile view for logged-in users.
     */
    public function test_profile_route_renders_profile_view_for_logged_in_users(): void
    {
        $response = $this->actingAs($user = User::find(1))->get('/profile');

        $response->assertOk();

        $response->assertViewIs('profile');

        $response->assertSee([
            'input',
            'type="text"',
            'name="name"',
            $user->name,
        ], false);

        $response->assertSee([
            'textarea',
            'name="name"',
            $user->about,
        ], false);
    }
}
