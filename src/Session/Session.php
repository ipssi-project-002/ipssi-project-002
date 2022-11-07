<?php

namespace App\Session;

use App\Model\UserModel;
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
                $user = (new UserModel())->findOne($decoded->sub);
                if ($user) {
                    $this->user = $user;
                    $this->is_logged_in = true;
                }
            } catch (\Exception $e) {
            }
        }
    }

    public function destroy(): void {
        setcookie(
            name: 'session',
            value: '',
            expires_or_options: time() - 3600,
            domain: $_SERVER['SERVER_NAME'],
            httponly: true
        );
        $this->user = null;
        $this->is_logged_in = false;
    }

    public function getUser(): ?User {
        return $this->user;
    }

    public function isLoggedIn(): bool {
        return $this->is_logged_in;
    }
}

?>
