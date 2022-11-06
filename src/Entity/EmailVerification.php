<?php

namespace App\Entity;

class EmailVerification extends Entity {
    protected ?string $id = null;
    protected string $emailAddress;
    protected \DateTime $requestDate;
    protected \DateTime $completionDate;

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'emailAddress' => $this->emailAddress,
            'requestDate' => $this->requestDate,
            'completionDate' => $this->completionDate
        ];
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getEmailAddress(): string {
        return $this->emailAddress;
    }

    public function getRequestDate(): \DateTime {
        return $this->requestDate;
    }

    public function getCompletionDate(): \DateTime {
        return $this->completionDate;
    }
}

?>
