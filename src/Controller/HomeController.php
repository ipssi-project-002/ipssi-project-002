<?php

namespace App\Controller;

use App\Model\DishModel;

class HomeController extends DefaultController {
    public function home(array $params) {
        $available_dishes = array();
        $dishes = (new DishModel())->find();
        foreach ($dishes as $dish) {
            if ($dish->getLatestChange()->getStatus() === 'available') {
                $available_dishes[] = $dish;
            }
        }
        $this->render('Home/home', [ 'available_dishes' => $available_dishes ]);
    }
}
