<?php

namespace App\Model;

use App\Entity\PasswordReset;

class PasswordResetModel extends DefaultModel {
    protected string $table_name = 'PASSWORD_RESETS';
    protected string $entity = PasswordReset::class;
}

?>
