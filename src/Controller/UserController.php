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
        $_users = $this->model->find();
        $users = array();
        foreach ($_users as $_user) {
            $users[] = User::fromRecord($_user);
        }
        $this->render('User/index', [ 'users' => $users ]);
    }
}

?>
