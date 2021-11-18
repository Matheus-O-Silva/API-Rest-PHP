<?php

namespace App\Controllers;

class AuthController {
    
    /**
     * Método responsável por realizar login via JWT
     * @param string $email
     * @param string $password
     * @return string 
     */
    public function login() : string
    {   
        //Application Key
        $key = '123456';

        //Header Token
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        //Payload - Content
        $payload = [
            'name' => 'Matt',
            'email' => 'email@email.com',
        ];

        //JSON
        $header = json_encode($header);
        $payload = json_encode($payload);

        //Base 64
        $header = base64_encode($header);
        $payload = base64_encode($payload);

        //Sign
        $sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
        $sign = base64_encode($sign);

        //Token
        $token = $header . '.' . $payload . '.' . $sign;

        return $token;
    
    }

}