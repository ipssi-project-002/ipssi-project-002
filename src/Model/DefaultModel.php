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
}
?>
