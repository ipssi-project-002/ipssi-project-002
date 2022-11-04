<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;

class UserController extends DefaultController {
    private UserModel $model;
    private User $entity;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function index(): void {
        $users = $this->model->find();
        $this->render('User/index', [ 'users' => $users ]);
    }
}

?>
