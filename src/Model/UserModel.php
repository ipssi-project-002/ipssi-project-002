<?php

namespace App\Model;

use App\Entity\User;

class UserModel extends DefaultModel {
    protected string $table_name = 'USERS';
    protected string $entity = User::class;

    public function find(array $filters = []): array {
        $users = parent::find($filters);
        foreach ($users as $user) {
            $preferences = (new UserPreferenceModel())->find([
                'user' => $user->getId()
            ]);
            foreach ($preferences as $preference) {
                $user->addPreference($preference);
            }

            $email_verifications = (new EmailVerificationModel())->find([
                'emailAddress' => $user->getEmailAddress()
            ]);
            foreach ($email_verifications as $email_verification) {
                $user->addEmailVerification($email_verification);
            }

            $password_resets = (new PasswordResetModel())->find([
                'customer' => $user->getId()
            ]);
            foreach ($password_resets as $password_reset) {
                $user->addPasswordReset($password_reset);
            }
        }
        return $users;
    }

    public function save(array $users) {
        $entities = parent::save($users);
        foreach ($users as $user) {
            $preferences = array();
            foreach ($user->getPreferences() as $preference) {
                $preferences[] = $preference;
            }
            if (! empty($preferences)) {
                (new UserPreferenceModel())->save($preferences);
            }

            $email_verifications = $user->getEmailVerifications();
            if (! empty($email_verifications)) {
                (new EmailVerificationModel())->save($email_verifications);
            }

            $password_resets = $user->getPasswordResets();
            if (! empty($password_resets)) {
                (new PasswordResetModel())->save($password_resets);
            }
        }
        return $entities;
    }
}

?>
