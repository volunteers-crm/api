<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleApiTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);

        $response->assertJson([
            'data' => 'ok',
        ]);
    }
}
