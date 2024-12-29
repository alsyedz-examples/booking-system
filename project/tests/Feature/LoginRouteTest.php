<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginRouteTest extends TestCase
{
    /**
     * A test to see if login route is rendering login view for guest users.
     */
    public function test_login_route_renders_login_view_for_guest_users(): void
    {
        $response = $this->get('/login');

        $response->assertOk();

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
     * A test to see if login route is redirecting to profile show route for logged-in users.
     */
    public function test_login_route_redirects_to_profile_show_route_for_logged_in_users(): void
    {
        $response = $this->actingAs($user = User::find(1))->get('/login');

        $response->assertRedirectToRoute('profile.show');
    }

    /**
     * A test to see if login route is rendering profile view for logged-in users.
     */
    public function test_login_route_renders_profile_view_for_logged_in_users(): void
    {
        $response = $this->actingAs($user = User::find(1))->followingRedirects()->get('/login');

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
