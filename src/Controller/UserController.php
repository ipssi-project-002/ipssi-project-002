<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;

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
        $user = $this->model->findOne([ 'username' => 'tomtom' ]);
        $user->setPasswordHash(password_hash('password', PASSWORD_DEFAULT));
        $user->setPreference('receiveNewsletter', '0');
        $user->setPreference('theme', 'system');
        $this->model->saveOne($user);
        $this->render('User/index', [ 'users' => [ $user ] ]);
    }
}

?>
