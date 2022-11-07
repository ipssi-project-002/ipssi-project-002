<?php

namespace App\Session;

use App\Entity\User;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Session {
    protected ?User $user = null;
    protected bool $is_logged_in = false;

    public function __construct() {
        if (isset($_COOKIE['session'])) {
            $token = $_COOKIE['session'];
            $key = new Key($_ENV['SECRET_KEY'], 'HS512');
            try {
                $decoded = JWT::decode($token, $key);
            } catch (\Exception $e) {
            }
            $decoded = JWT::decode($token, $key);
            $this->decoded = $decoded;
        }
    }
}

?>
