<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;

use App\Utils;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController extends DefaultController {
    public function __construct() {
        $this->model = new UserModel();
        $this->entity = new User();
    }

    public function index(): void {
        $users = $this->model->find();
        $this->render('User/index', [ 'users' => $users ]);
    }

    public function test(): void {
        $this->render('Test/test', [ 'data' => $_SESSION['session']->decoded ]);

        /*
        $user = $this->model->findOne([ 'username' => 'tomtom' ]);
        $user->setPasswordHash(password_hash('password', PASSWORD_DEFAULT));
        $user->setPreference('receiveNewsletter', '0');
        $user->setPreference('theme', 'system');
        $this->model->saveOne($user);
        $this->render('User/index', [ 'users' => [ $user ] ]);
        */
    }

    public function login(): void {
        $users = $this->model->find();
        $this->render('User/signIn');
    }

    public function loginSubmit(): void {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = $this->model->findOne([
            'username' => $login,
            'emailAddress' => $login
        ]);
        if ($user && password_verify($password, $user->getPasswordHash())) {
            $time = time();
            $payload = [
                'sub' => $user->getId(),
                'iat' => $time,
                'exp' => $time + (60 * 60 * 24 * 365.25)
            ];
            $jwt = JWT::encode(
                payload: $payload,
                key: $_ENV['SECRET_KEY'],
                alg: 'HS512'
            );
            setcookie(
                name: 'session',
                value: $jwt,
                expires_or_options: $payload['exp'],
                domain: $_SERVER['SERVER_NAME'],
                httponly: true
            );
            Utils::redirect('', [
                'page' => 'home'
            ]);
        } else {
            $_SESSION['error'] = 'Informations de connexion incorrectes.';
            Utils::redirect('', [
                'page' => 'user',
                'action' => 'login'
            ]);
        }
    }

    public function signup(): void {
        $users = $this->model->find();
        $this->render('User/signUp');
    }
}

?>
