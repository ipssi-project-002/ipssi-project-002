<?php

namespace App\Controller;

class ErrorController extends DefaultController {
    public function error404(array $params) {
        $this->render('Error/404', $params);
    }
}
