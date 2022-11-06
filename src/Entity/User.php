<?php

namespace App\Entity;

class User extends Entity {
    protected ?string $id = null;
    protected ?string $username = null;
    protected string $firstName;
    protected string $lastName;
    protected string $emailAddress;
    protected ?string $phoneNumber = null;
    protected ?string $passwordHash = null;
    protected string $accountType;
    protected ?array $profilePicture = null;
    protected ?\DateTime $createdTime = null;
    protected array $userPreferences = [];
    protected array $emailVerifications = [];
    protected array $passwordResets = [];
    protected array $shoppingCart = [];

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'username' => $this->username,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'emailAddress' => $this->emailAddress,
            'phoneNumber' => $this->phoneNumber,
            'passwordHash' => $this->passwordHash,
            'accountType' => $this->accountType
        ];
        $profile_picture = $this->getProfilePicture();
        if (! is_null($profile_picture)) {
            $record['fields']['profilePicture'] = [ $profile_picture->toRecord() ];
        }
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $first_name): void {
        $this->firstName = $first_name;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $last_name): void {
        $this->lastName = $last_name;
    }

    public function getEmailAddress(): string {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $email_address): void {
        $this->emailAddress = $email_address;
    }

    public function getPhoneNumber(): ?string {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phone_number): void {
        $this->phoneNumber = $phone_number;
    }

    public function getPasswordHash(): ?string {
        return $this->passwordHash;
    }

    public function setPasswordHash(?string $password_hash): void {
        $this->passwordHash = $password_hash;
    }

    public function getAccountType(): string {
        return $this->accountType;
    }

    public function setAccountType(string $account_type): void {
        $this->accountType = $account_type;
    }

    public function getProfilePicture(): ?Picture {
        if (is_array($this->profilePicture) && count($this->profilePicture) > 0) {
            return Picture::fromArray((array) $this->profilePicture[0]);
        } else {
            return Picture::default();
        }
    }

    public function setProfilePicture(Picture $profile_picture): void {
        $this->profilePicture = [ $profile_picture ];
    }

    public function getCreatedTime(): ?\DateTime {
        return $this->createdTime;
    }

    public function setCreatedTime(?\DateTime $created_time): void {
        $this->createdTime = $created_time;
    }

    public function getPreferences(): array {
        return $this->userPreferences;
    }

    public function getPreference(string $key): array {
        return $this->userPreferences[$key];
    }

    public function setPreference(string $key, string $value): void {
        if (isset($this->userPreferences[$key]) && $this->userPreferences[$key] instanceof UserPreference) {
            $this->userPreferences[$key]->setValue($value);
        } else {
            $this->userPreferences[$key] = UserPreference::fromArray([
                'user' => [ $this->id ],
                'key' => $key,
                'value' => $value
            ]);
        }
    }

    public function addPreference(UserPreference $user_preference): void {
        $this->userPreferences[$user_preference->getKey()] = $user_preference;
    }

    public function getEmailVerifications(): array {
        return $this->emailVerifications;
    }

    public function addEmailVerification(EmailVerification $email_verification): void {
        $this->emailVerifications[] = $email_verification;
    }

    public function getPasswordResets(): array {
        return $this->passwordResets;
    }

    public function addPasswordReset(PasswordReset $password_reset): void {
        $this->passwordResets[] = $password_reset;
    }

    public function getShoppingCart(string $dish_id): ShoppingCart {
        return $this->shoppingCart[$dish_id];
    }

    public function setShoppingCart(ShoppingCart $shopping_cart): void {
        $this->shoppingCart[$shopping_cart->getDishId()] = $shopping_cart;
    }
}

?>
