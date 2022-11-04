<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {
    private Client $client;
    private PHPMailer $phpmailer;
    private string $subject;
    private string $body;
    private array $sender;
    private array $recipients;
    private bool $is_body_html;
    private array $reply_to;
    private array $cc;
    private array $bcc;
    private array $attachments;
    private ?string $alt_body;
    private bool $debug_mode;

    public function __construct(
        Client $client,
        string $subject,
        string $body,
        array $sender,
        array $recipients,
        bool $is_body_html = true,
        array $reply_to = [],
        array $cc = [],
        array $bcc = [],
        array $attachments = [],
        ?string $alt_body = null,
        bool $debug_mode = false
    ) {
        $this->client = $client;
        $this->subject = $subject;
        $this->body = $body;
        $this->sender = $sender;
        $this->recipients = $recipients;
        $this->is_body_html = $is_body_html;
        $this->reply_to = $reply_to;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->attachments = $attachments;
        $this->alt_body = $alt_body;
        $this->debug_mode = $debug_mode;

        $phpmailer = clone $client->phpmailer;

        $phpmailer->setFrom(...$sender);
        foreach ($recipients as $recipient) {
            $phpmailer->addAddress(...$recipient);
        }
        foreach ($reply_to as $reply_to_item) {
            $phpmailer->addReplyTo(...$reply_to_item);
        }
        foreach ($cc as $cc_item) {
            $phpmailer->addCC(...$cc_item);
        }
        foreach ($bcc as $bcc_item) {
            $phpmailer->addBCC(...$bcc_item);
        }
        foreach ($attachments as $attachment) {
            $phpmailer->addAttachment(...$attachment);
        }

        $phpmailer->Subject = $subject;
        $phpmailer->Body = $body;
        $phpmailer->isHTML($is_body_html);
        if ($alt_body) {
            $phpmailer->AltBody = $alt_body;
        }

        $this->phpmailer = $phpmailer;
    }

    public function send() {
        $this->phpmailer->send();
    }
}

?>
