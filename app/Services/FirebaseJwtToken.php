<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class FirebaseJwtToken
{
    const JWT_KEY = 'YOnsEb4Smg';
    const ALG = 'HS256';
    const TOKEN_EXPIRING_TIME = 10; // s
    const TOKEN_REFRESH_TIME = 3600; // s

    /**
     * @param $token
     * @return false|\stdClass
     * Validate token jwt
     */
    public function validate($token)
    {
        $payload = $this->decode($token);
        if ($payload && $payload->exp > time()) {
            return $payload;
        }
        return false;
    }

    public function genAccessToken($user)
    {
        $payload = [
            "id" => $user->id,
            "email" => $user->email,
            // standard fields
            'iss' => 'Project Laravel',
            'iat' => time(),
            "exp" => time() + self::TOKEN_EXPIRING_TIME
        ];

        return JWT::encode($payload, self::JWT_KEY, self::ALG);
    }

    public function genRefreshToken($user)
    {
        $payload = [
            "id" => $user->id,
            "email" => $user->email,
            // standard fields
            'iss' => 'Project Laravel',
            'iat' => time(),
            "exp" => time() + self::TOKEN_REFRESH_TIME
        ];

        return JWT::encode($payload, self::JWT_KEY, self::ALG);
    }

    public function decode($token)
    {
        // @todo handle case jwt expiration time
        return JWT::decode($token, new Key(self::JWT_KEY, self::ALG));
    }
}
