<?php

namespace App\Entity;

class BookingChange extends Entity {
    protected ?string $id = null;
    protected array $booking;
    protected \DateTime $changeDate;
    protected string $status;
    protected array $author;
    protected ?string $comment = null;

    public function toRecord(): object {
        $record = (array) parent::toRecord();
        $record['fields'] = [
            ...$record['fields'],
            'booking' => [ $this->getBookingId() ],
            'changeDate' => $this->requestDate,
            'status' => $this->status,
            'author' => [ $this->getAuthorId() ],
            'comment' => $this->comment
        ];
        return (object) $record;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getBookingId(): string {
        return $this->booking[0];
    }

    public function getChangeDate(): \DateTime {
        return $this->changeDate;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getAuthorId(): string {
        return $this->author[0];
    }

    public function getComment(): ?string {
        return $this->comment;
    }
}
