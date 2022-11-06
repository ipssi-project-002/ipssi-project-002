<?php

namespace App\Entity;

class ShoppingCart extends Entity {
    protected ?string $id = null;
    protected array $customer;
    protected array $dish;
    protected int $quantity;

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'customer' => [ $this->getCustomerId() ],
            'dish' => [ $this->getDishId() ],
            'quantity' => $this->quantity
        ];
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getCustomerId(): string {
        return $this->customer[0];
    }

    public function getDishId(): string {
        return $this->dish[0];
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function addQuantity(int $quantity): void {
        $this->quantity += $quantity;
    }

    public function subtractQuantity(int $quantity): void {
        $this->quantity -= $quantity;
        if ($this->quantity < 0) {
            $this->quantity = 0;
        }
    }
}

?>
