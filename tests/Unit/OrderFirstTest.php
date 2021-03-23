<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderFirstTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $loginData = [
            'email' => 'clark3@gmail.com',
            'password' => 'clark',
        ];
        $token = $this->json('POST','/api/login', $loginData)->getContent();
        $json = json_decode($token, true);
         $data = [
            'order_id' => '1',
            'quantity' => '4',
        ];
        $response = $this->withHeader('Authorization', 'Bearer ' . $json["access_token"]["token"])
        ->json('post', '/api/orders', $data);
        $response->assertStatus(201);
        
    }
}
