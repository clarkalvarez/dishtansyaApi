<?php

namespace Tests\Unit;

use Tests\TestCase;
 
class RegisterFirstTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'email' => 'clark3@gmail.com',
            'password' => 'clark',
            'name' => 'clark',
        ];
        $response = $this->post('/api/register', $data);
        $response->assertStatus(201);
        
    }
}
