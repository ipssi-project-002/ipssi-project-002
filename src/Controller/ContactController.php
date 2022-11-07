<?php

namespace App\Controller;

use App\Utils;
use App\Mail\Client;

class ContactController extends DefaultController {
    public function contact(): void {
        $this->render('Contact/contact');
    }

    public function contactSubmit(): void {
        $client = (new Client(
            host: $_ENV['EMAIL_SMTP_HOST'], 
            port: intval($_ENV['EMAIL_SMTP_PORT']),
            username: $_ENV['EMAIL_SMTP_USERNAME'],
            password: $_ENV['EMAIL_SMTP_PASSWORD'],
            smtp_secure: $_ENV['EMAIL_SMTP_SECURE'],
            charset: 'UTF-8',
            encoding: 'base64'
        ))->mail(
            subject: $_POST['subject'],
            body: $_POST['comment'],
            sender: [ $_ENV['EMAIL_ADDRESS'], $_ENV['EMAIL_SENDER'] ],
            recipients: [
                [ $_POST['email'] ],
                [ $_ENV['EMAIL_ADDRESS'], $_ENV['EMAIL_SENDER'] ]
            ],
            is_body_html: true,
            debug_mode: false
        )->send();
    
        Utils::redirect('', [
            'page' => 'contact',
            'action' => 'create'
        ]);
    }
}

?>
