<?php

namespace App\Controller;

use App\Model\DishModel;

class HomeController extends DefaultController {
    public function home(array $params) {
        $dishes = (new DishModel())->find();
        
        $this->render('Home/home', $params);
    }
}
