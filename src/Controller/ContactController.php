<?php

namespace App\Controller;
use App\Utils;

class ContactController extends DefaultController {
    public function contact(): void {
        $this->render('Contact/contact');
    }

    public function contactSubmit(){
        Utils::redirect('', [
            'page' => 'contact',
            'action' => 'create'
        ]);
    }
}

?>
