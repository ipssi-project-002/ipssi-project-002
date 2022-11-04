<?php

namespace App\Model;

use App\Airtable\Airtable;

class DefaultModel extends Airtable {
    protected string $table;

    find(array $filters)
    findOne(array $id)
    findBy(array $filters)
    findOneBy(array $filters)

    public function findBy(array $filters): array {
        if (! empty($filters)) {
            $query = [ 'filterByFormula' => self::formula($filters) ];
        } else {
            $query = [];
        }
        $records = $this->get($this->table, $query)->getRecords();
        return is_null($records)
            ? throw new \Exception('Airtable: Request failed')
            : $records;
    }

    public function 

    public function findAll(array $filters): array {
        if (! empty($filters)) {
            $query = [ 'filterByFormula' => self::formula($filters) ];
        } else {
            $query = array();
        }
        $records = $this->get($this->table, $query)->getRecords();
        return is_null($records)
            ? throw new \Exception('Request failed')
            : $records;
    }

    public function find(array $filters): ?object {
        $formula = self::formula(['RECORD_ID()' => $id]);
        $records = $this->get($this->table, ['filterByFormula' => $formula])->getRecords();
        if (is_null($records)) {
            return throw new \Exception('Request failed');
        }
        if (count($records) < 1) {
            return null;
        } else {
            return $records[0];
        }
    }
}
?>
