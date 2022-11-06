<?php

namespace App\Entity;

class UserPreference extends Entity {
    protected string $id;
    protected array $user;
    protected string $key;
    protected string $value;

    public function getId(): string {
        return $this->id;
    }

    public function getUserId(): string {
        return $this->user[0];
    }

    public function getKey(): string {
        return $this->key;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function setValue(string $value): void {
        $this->value = $value;
    }
}

?>
