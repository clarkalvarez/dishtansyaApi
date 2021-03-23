<?php

namespace Tests\Unit;

use Tests\TestCase;
 
 class LoginFirstTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //First Test
        $data = [
            'email' => 'clark3@gmail.com',
            'password' => 'clark',
        ];
        $response=$this->json('POST','/api/login', $data)
        ->assertStatus(201);
        
    }
}

 