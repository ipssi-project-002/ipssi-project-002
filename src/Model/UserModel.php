<?php

namespace App\Model;

use App\Entity\User;

class UserModel extends DefaultModel {
    protected string $table_name = 'USERS';
    protected string $entity = User::class;

    public function findEnriched(array $filters = []): array {
        $users = $this->find($filters);
        foreach ($users as $user) {
            $preferences = (new UserPreferenceModel())->find([
                'user' => $user->getId()
            ]);
            $user->setPreferences($preferences);
        }
        return $users;
    }
}

?>
