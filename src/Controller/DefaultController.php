<?php

namespace App\Controller;

class DefaultController {
    protected $model;
    protected $entity;

    public function render(string $template, array $data = []) {
        extract($data);
        ob_start();
        require TEMPLATE_PATH . "/${template}.php";
        $content = ob_get_clean();
        require TEMPLATE_PATH . '/Base/layout.php';
    }
}

?>
