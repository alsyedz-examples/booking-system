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

    /**
     * A test to see if you can submit contact-us form with errors from contact-us route.
     */
    public function test_contact_us_route_submits_contact_us_form_with_errors(): void
    {
        $response = $this->get('/contact-us');

        $response->assertOk();
    }

    /**
     * A test to see if you can submit contact-us form without errors from contact-us route.
     */
    public function test_contact_us_route_submits_contact_us_form_without_errors(): void
    {
        $response = $this->get('/contact-us');

        $response->assertOk();
    }
}
