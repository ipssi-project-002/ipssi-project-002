<?php

namespace App\Controller;

class DishController extends DefaultController {
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
