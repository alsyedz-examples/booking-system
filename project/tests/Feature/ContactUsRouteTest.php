<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactUsRouteTest extends TestCase
{
    /**
     * A test to see if contact-us route is rendering contact-us view.
     */
    public function test_contact_us_route_renders_contact_us_view(): void
    {
        $response = $this->get('/contact-us');

        $response->assertOk();

        $response->assertViewIs('contact-us');

        $response->assertSee([
            'input',
            'type="email"',
            'name="email"',
        ], false);

        $response->assertSee([
            'input',
            'type="text"',
            'name="subject"',
        ], false);

        $response->assertSee([
            'textarea',
            'name="subject"',
        ], false);
    }
}
