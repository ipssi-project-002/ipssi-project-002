<?php

namespace App\Model;

use App\Entity\UserPreference;

class UserPreferenceModel extends DefaultModel {
    protected string $table_name = 'USER_PREFERENCES';
    protected string $entity = UserPreference::class;
}

?>
