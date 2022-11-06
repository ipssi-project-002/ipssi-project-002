<?php

namespace App\Model;

use App\Airtable\Airtable;
use App\Entity\Entity;

class DefaultModel extends Airtable {
    protected string $table_name;
    protected string $table_id;
    protected string $entity = Entity::class;
    

    public function __construct() {
        parent::__construct();
        $this->table_id = $this->getTable($this->table_name);
    }

    public function find(array $filters = []): array {
        if (! empty($filters)) {
            $query = [ 'filterByFormula' => self::formula($filters) ];
        } else {
            $query = [];
        }
        $records = $this->get($this->table_id, $query)->getRecords();
        if (is_null($records)) {
            return throw new \Exception('Airtable: Request failed');
        } else {
            $entities = array();
            foreach ($records as $record) {
                $entities[] = $this->entity::fromRecord($record);
            }
            return $entities;
        }
    }

    public function findOne(string|array $id_or_filters): ?object {
        if (is_string($id_or_filters)) {
            $filters = [ 'RECORD_ID()' => $id_or_filters ];
        } else {
            $filters = $id_or_filters;
        }
        $records = $this->find($filters);
        if (is_null($records)) {
            return throw new \Exception('Airtable: Request failed');
        }
        $length = count($records);
        if ($length === 1) {
            return $records[0];
        } else {
            return throw new \Exception("Airtable: Expected 1 record, got ${length}");
        }
    }

    public function save(array $entities) {
        $records = array();
        foreach ($entities as $entity) {
            $records[] = $entity->toRecord();
        }
        $updated_records = $this->update($this->table_id, $records)->getRecords();
        if (is_null($updated_records)) {
            return throw new \Exception('Airtable: Request failed');
        }
        $length = count($records);
        $length_updated = count($updated_records);
        if ($length === $length_updated) {
            $entities = array();
            foreach ($updated_records as $record) {
                $entities[] = $this->entity::fromRecord($record);
            }
            return $entities;
        } else {
            return throw new \Exception("Airtable: Expected {$length} record(s) to be updated, got {$length_updated}");
        }
    }

    public function saveOne(object $entity): object {
        $updated_entities = $this->save([ $entity ]);
        if (is_null($updated_entities)) {
            return throw new \Exception('Airtable: Request failed');
        }
        $length = count($updated_entities);
        if ($length === 1) {
            return $updated_entities[0];
        } else {
            return throw new \Exception("Airtable: Expected 1 record to be updated, got {$length}");
        }
    }

    public function remove(array $entities): bool {
        $ids = array();
        foreach ($entities as $entity) {
            $ids[] = $entity->getId();
        }
        $removed_records = $this->delete($this->table_id, $ids)->getRecords();
        if (is_null($removed_records)) {
            return throw new \Exception('Airtable: Request failed');
        }
        $length = count($ids);
        $length_removed = count($removed_records);
        if ($length === $length_removed) {
            return true;
        } else {
            return throw new \Exception("Airtable: Expected {$length} record(s) to be removed, got {$length_removed}");
        }
    }

    public function removeOne(object $entity): bool {
        return $this->remove([ $entity ]);
    }
}
?>
