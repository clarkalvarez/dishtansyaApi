<?php

namespace Tests\Unit;

use Tests\TestCase;

class OrderSecondTest extends TestCase
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
            'order_id' => '2',
            'quantity' => '12',
        ];
        $response = $this->withHeader('Authorization', 'Bearer ' . $json["access_token"]["token"])
        ->json('post', '/api/orders', $data);
        $response->assertStatus(201);
        
    }
}
