<?php

namespace App\Controller;

use App\Model\DefaultModel;
use App\Entity\Entity;

class DefaultController {
    protected DefaultModel $model;
    protected Entity $entity;

    public function render(string $template, array $data = []) {
        extract($data);
        ob_start();
        require TEMPLATE_PATH . "/${template}.php";
        $content = ob_get_clean();
        require TEMPLATE_PATH . '/Base/layout.php';
    }
}

?>
