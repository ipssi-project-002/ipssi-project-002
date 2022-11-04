<?php

namespace App\Entity;

class User extends Entity {
    protected string $id;
    protected ?string $username = null;
    protected string $firstName;
    protected string $lastName;
    protected string $emailAddress;
    protected ?string $phoneNumber = null;
    protected ?string $passwordHash = null;
    protected string $accountType;
    protected ?object $profilePicture = null;
    protected ?\DateTime $createdTime = null;
    protected array $userPreferences = [];
    protected array $emailVerifications = [];
    protected array $passwordResets = [];
    protected array $shoppingCart = [];

    public function getId(): string {
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

    public function getProfilePicture(): ?object {
        return $this->profilePicture;
    }

    public function setProfilePicture(?object $profile_picture): void {
        $this->profilePicture = $profile_picture;
    }

    public function getCreatedTime(): ?\DateTime {
        return $this->createdTime;
    }

    public function setCreatedTime(?\DateTime $created_time): void {
        $this->createdTime = $created_time;
    }

    public function getPreference(string $key): array {
        return $this->userPreferences[$key];
    }

    public function setPreference(string $key, string $value): void {
        $this->userPreferences[$key] = $value;
    }

    public function getEmailVerifications(): array {
        return $this->emailVerifications;
    }
    
    public function setEmailVerifications(array $email_verifications): void {
        $this->emailVerifications = $email_verifications;
    }

    public function getPasswordResets(): array {
        return $this->passwordResets;
    }

    public function setPasswordResets(array $password_resets): void {
        $this->passwordResets = $password_resets;
    }

    public function getShoppingCart(string $dish_id): array {
        return $this->shoppingCart[$dish_id];
    }

    public function setShoppingCart(string $dish_id, array $dish): void {
        $this->shoppingCart[$dish_id] = $dish;
    }
}

?>
