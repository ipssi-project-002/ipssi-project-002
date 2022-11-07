<?php

namespace App\Model;

use App\Entity\Booking;

class BookingModel extends DefaultModel {
    protected string $table_name = 'BOOKINGS';
    protected string $entity = Booking::class;

    public function find(array $filters = []): array {
        $bookings = parent::find($filters);
        foreach ($bookings as $booking) {
            $changes = (new BookingChangeModel())->find([
                'booking' => $booking->getId()
            ]);
            foreach ($changes as $change) {
                $booking->addChange($change);
            }
        }
        return $bookings;
    }

    public function save(array $bookings) {
        $entities = parent::save($bookings);
        foreach ($bookings as $booking) {
            $changes = array();
            foreach ($booking->getChanges() as $change) {
                $changes[] = $change;
            }
            if (! empty($changes)) {
                (new BookingChangeModel())->save($changes);
            }
        }
        return $entities;
    }
}
