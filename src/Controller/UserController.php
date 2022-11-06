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
        $users = $this->model->findEnriched();
        $this->render('User/index', [ 'users' => $users ]);
    }
    public function login(): void {
        $users = $this->model->findEnriched();
        $this->render('User/signIn');
    }
    public function signup(): void {
        $users = $this->model->findEnriched();
        $this->render('User/signUp');
    }
}

?>
