<?php

namespace App\Entity;

class Booking extends Entity {
    protected ?string $id = null;
    protected array $user;
    protected \DateTime $arrivalDate;
    protected \DateTime $departureDate;
    protected int $numberOfGuests;
    protected array $changes = [];

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'user' => [ $this->getUserId() ],
            'arrivalDate' => $this->arrivalDate,
            'departureDate' => $this->departureDate,
            'numberOfGuests' => $this->numberOfGuests
        ];
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getUserId(): string {
        return $this->user[0];
    }

    public function getArrivalDate(): \DateTime {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTime $arrivalDate): void {
        $this->arrivalDate = $arrivalDate;
    }

    public function getDepartureDate(): \DateTime {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTime $departureDate): void {
        $this->departureDate = $departureDate;
    }

    public function getNumberOfGuests(): int {
        return $this->numberOfGuests;
    }

    public function setNumberOfGuests(int $numberOfGuests): void {
        $this->numberOfGuests = $numberOfGuests;
    }

    public function getChanges(): array {
        return $this->changes;
    }

    public function getLatestChange(): ?BookingChange {
        $changes = $this->getChanges();
        usort($changes, function ($a, $b) {
            return $a->getChangeDate() < $b->getChangeDate();
        });
        if (count($changes) > 0) {
            return $changes[0];
        } else {
            return null;
        }
    }

    public function addChange(BookingChange $change): void {
        $this->changes[] = $change;
    }
}

?>
