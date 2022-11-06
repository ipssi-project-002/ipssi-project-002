<?php

namespace App\Model;

use App\Entity\EmailVerification;

class EmailVerificationModel extends DefaultModel {
    protected string $table_name = 'EMAIL_VERIFICATIONS';
    protected string $entity = EmailVerification::class;
}

?>
