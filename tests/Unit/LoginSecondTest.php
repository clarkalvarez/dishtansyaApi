<?php

namespace Tests\Unit;

use Tests\TestCase;
 
 class LoginSecondTest extends TestCase
{
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
        ];
        $response=$this->json('POST','/api/login', $data)
        ->assertStatus(201);

    }
}

 