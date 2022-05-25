<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleWebTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertJson([
            'data' => 'ok',
        ]);
    }
}
