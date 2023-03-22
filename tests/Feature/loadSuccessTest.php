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

    public function testRegisterPageLoads()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Register');
    }

    public function testLoginPageLoads()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login');
    }

    public function testHomePageLoads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Home');
    }

    public function testDetailPageLoads()
    {
        $response = $this->get('/detail/{slug}');

        $response->assertStatus(200);
        $response->assertSee('Detail');
    }
}
