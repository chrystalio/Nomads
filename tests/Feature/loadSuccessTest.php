<?php

namespace Tests\Feature;
use Tests\TestCase;

class loadSuccessTest extends TestCase
{
    /**
     * Check if the expected view is loaded
     *
     * @return void
     */

    public function testCheckoutPageLoads()
    {
        $response = $this->get('/checkout');

        $response->assertStatus(200);
        $response->assertSee('Checkout');
    }

    public function testCheckoutSuccessPageLoads()
    {
        $response = $this->get('/checkout/success');

        $response->assertStatus(200);
        $response->assertSee('Checkout Success');
    }

    public function testDetailPageLoads()
    {
        $response = $this->get('/detail');

        $response->assertStatus(200);
        $response->assertSee('Detail');
    }
}
