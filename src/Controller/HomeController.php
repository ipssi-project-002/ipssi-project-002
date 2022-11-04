<?php

namespace App\Controller;

class HomeController extends DefaultController {
    public function home(array $params) {
        $this->render('Home/home', $params);
    }
}
