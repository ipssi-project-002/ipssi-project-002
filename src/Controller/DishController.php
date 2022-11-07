<?php

namespace App\Controller;

use App\Model\DishModel;

class DishController extends DefaultController {
    protected $model;

    public function __construct() {
        $this->model = new DishModel();
    }

    public function index(): void {
        $dishes = $this->model->find();
        $this->render('Dish/index', [ 'dishes' => $dishes ]);
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
