<?php

namespace App\Model;

use App\Entity\DishChange;

class DishChangeModel extends DefaultModel {
    protected string $table_name = 'DISH_CHANGES';
    protected string $entity = DishChange::class;
}

?>
