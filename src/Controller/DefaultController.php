<?php

namespace App\Controller;

class DefaultController {
    public function render(string $template, array $data = []) {
        extract($data);
        ob_start();
        require TEMPLATE_PATH . "/${template}.php";
        $content = ob_get_clean();
        require TEMPLATE_PATH . '/Base/layout.php';
    }

    public function render404(array $params = []) {
        $this->render('Base/404', $params);
    }
}

?>
