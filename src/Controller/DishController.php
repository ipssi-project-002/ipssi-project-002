<?php

namespace App\Controller;

use App\Model\DishModel;

class DishController extends DefaultController {
    private DishModel $model;

    public function __construct() {
        $this->model = new DishModel();
    }

    public function view(array $params) {
        $this->render('Dish/view', $params);
    }

    public function edit(array $params) {
        $this->render('Dish/edit', $params);
    }

    public function add(array $params) {
        $this->render('Dish/add', $params);
    }
    
    public function delete(array $params) {
        $this->render('Dish/delete', $params);
    }
}

?>
