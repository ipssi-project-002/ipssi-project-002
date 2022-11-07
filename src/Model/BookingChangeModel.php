<?php

namespace App\Model;

use App\Entity\BookingChange;

class BookingChangeModel extends DefaultModel {
    protected string $table_name = 'BOOKING_CHANGES';
    protected string $entity = BookingChange::class;
}

?>
