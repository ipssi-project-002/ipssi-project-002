<?php

namespace App\Model;

use App\Entity\Dish;

class DishModel extends DefaultModel {
    protected string $table_name = 'DISHES';
    protected string $entity = Dish::class;

    public function find(array $filters = []): array {
        $dishes = parent::find($filters);
        foreach ($dishes as $dish) {
            $changes = (new DishChangeModel())->find([
                'dish' => $dish->getId()
            ]);
            foreach ($changes as $change) {
                $dish->addChange($change);
            }
        }
        return $dishes;
    }

    public function save(array $dishes) {
        $entities = parent::save($dishes);
        foreach ($dishes as $dish) {
            $changes = array();
            foreach ($dish->getChanges() as $change) {
                $changes[] = $change;
            }
            if (! empty($changes)) {
                (new DishChangeModel())->save($changes);
            }
        }
        return $entities;
    }
}
