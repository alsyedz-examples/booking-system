<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexRouteTest extends TestCase
{
    /**
     * A test to see if index route is rendering home view.
     */
    public function test_index_route_renders_home_view(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        $response->assertViewIs('home');

        $response->assertSeeText(config('app.name'));
    }
}
