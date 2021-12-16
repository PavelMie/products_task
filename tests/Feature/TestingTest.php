<?php

namespace Tests\Feature;

use App\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestingTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/alpha');

        $response->assertStatus(200);
        $response->assertSee('Alpha');
        $response->assertDontSee('Beta');
    }
}
