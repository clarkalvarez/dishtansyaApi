<?php

namespace Tests\Unit;

use Tests\TestCase;
 
class RegisterSecondTest extends TestCase
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
            'email' => 'clark4@gmail.com',
            'password' => 'clark',
            'name' => 'clark',
        ];
        $response = $this->post('/api/register', $data);
        $response->assertStatus(201);
        
    
    }
}
