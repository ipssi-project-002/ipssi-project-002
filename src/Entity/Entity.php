<?php

namespace App\Entity;

class Entity {
    public static function fromArray(array $data): Entity {
        $class = get_called_class();
        $entity = new $class();
        $reflection = new \ReflectionClass($entity);
        foreach ($reflection->getProperties() as $property) {
            $key = $property->getName();
            $type = $property->getType()->getName();
            if (isset($data[$key])) {
                switch ($type) {
                    case 'DateTime':
                        $entity->$key = new \DateTime($data[$key]);
                        break;
                    
                    default:
                        $entity->$key = $data[$key];
                        break;
                }
            }
            $property->setAccessible(true);
            if (! $property->isInitialized($entity)) {
                return throw new \Exception("Missing property {$key}");
            }
        }
        return $entity;
    }
    
    public static function fromRecord(object $record): Entity {
        foreach ($record->fields as $key => $value) {
            $record->$key = $value;
        }
        unset($record->fields);
        return self::fromArray((array) $record);
    }

    public function toRecord(): object {
        $record = [
            'fields' => []
        ];
        if (method_exists($this, 'getId')) {
            $id = $this->getId();
            if (! is_null($id)) {
                $record['id'] = $id;
            }
        }
        return (object) $record;
    }
}

?>
