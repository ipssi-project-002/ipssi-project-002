<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Client {
    public PHPMailer $phpmailer;

    public function __construct(
        string $host,
        int $port,
        string $username,
        string $password,
        ?string $smtp_secure = null, // 'tls' or 'ssl'
        ?string $charset = null, // 'UTF-8'
        ?string $encoding = null, // 'base64',
        bool $debug_mode = false
    ) {
        $phpmailer = new PHPMailer($debug_mode);
        $phpmailer->isSMTP();
        $phpmailer->Host = $host;
        $phpmailer->Port = $port;
        $phpmailer->SMTPAuth = true;
        $phpmailer->Username = $username;
        $phpmailer->Password = $password;
        if ($smtp_secure) {
            $phpmailer->SMTPSecure = $smtp_secure;
        }
        if ($charset) {
            $phpmailer->CharSet = $charset;
        }
        if ($encoding) {
            $phpmailer->Encoding = $encoding;
        }
        $this->phpmailer = $phpmailer;
    }

    public function mail(
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
    ): Mail {
        return new Mail($this, $subject, $body, $sender, $recipients, $is_body_html, $reply_to, $cc, $bcc, $attachments, $alt_body, $debug_mode);
    }
}

?>
