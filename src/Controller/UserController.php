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
}

?>
