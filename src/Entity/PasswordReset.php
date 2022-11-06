<?php

namespace App\Entity;

class PasswordReset extends Entity {
    protected ?string $id = null;
    protected array $customer;
    protected \DateTime $requestDate;
    protected \DateTime $completionDate;

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'customer' => [ $this->getCustomerId() ],
            'requestDate' => $this->requestDate,
            'completionDate' => $this->completionDate
        ];
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getCustomerId(): string {
        return $this->customer[0];
    }

    public function getRequestDate(): \DateTime {
        return $this->requestDate;
    }

    public function getCompletionDate(): \DateTime {
        return $this->completionDate;
    }
}

?>
