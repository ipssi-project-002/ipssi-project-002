<?php

namespace App\Entity;

class User {
    private int $id;
    private string $username;
    private string $first_name;
    private string $last_name;
    private string $email_address;
    private ?string $phone_number;
    private ?string $password_hash;
    private string $account_type;
    private ?object $profile_picture;
    private ?\DateTime $created_at;
    private array $user_preferences;
    private array $email_verifications;
    private array $password_resets;
    private array $shopping_cart;

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void {
        $this->first_name = $first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void {
        $this->last_name = $last_name;
    }

    public function getEmailAddress(): string {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address): void {
        $this->email_address = $email_address;
    }

    public function getPhoneNumber(): ?string {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): void {
        $this->phone_number = $phone_number;
    }

    public function getPasswordHash(): ?string {
        return $this->password_hash;
    }

    public function setPasswordHash(?string $password_hash): void {
        $this->password_hash = $password_hash;
    }

    public function getAccountType(): string {
        return $this->account_type;
    }

    public function setAccountType(string $account_type): void {
        $this->account_type = $account_type;
    }

    public function getProfilePicture(): ?object {
        return $this->profile_picture;
    }

    public function setProfilePicture(?object $profile_picture): void {
        $this->profile_picture = $profile_picture;
    }

    public function getCreatedAt(): ?\DateTime {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTime $created_at): void {
        $this->created_at = $created_at;
    }

    public function getPreference(string $key): array {
        return $this->user_preferences[$key];
    }

    public function setPreference(string $key, string $value): void {
        $this->user_preferences[$key] = $value;
    }

    public function getEmailVerifications(): array {
        return $this->email_verifications;
    }
    
    public function setEmailVerifications(array $email_verifications): void {
        $this->email_verifications = $email_verifications;
    }

    public function getPasswordResets(): array {
        return $this->password_resets;
    }

    public function setPasswordResets(array $password_resets): void {
        $this->password_resets = $password_resets;
    }

    public function getShoppingCart(string $dish_id): array {
        return $this->shopping_cart[$dish_id];
    }

    public function setShoppingCart(string $dish_id, array $dish): void {
        $this->shopping_cart[$dish_id] = $dish;
    }
}

?>
