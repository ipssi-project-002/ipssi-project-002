<?php

namespace App\Entity;

class Entity {
    public static function fromRecord(object $record): Entity {
        foreach ($record->fields as $key => $value) {
            $record->$key = $value;
        }
        unset($record->fields);
        $class = get_called_class();
        $entity = new $class();
        $reflect = new \ReflectionClass($entity);
        foreach ($reflect->getProperties() as $property) {
            $key = $property->getName();
            $type = $property->getType()->getName();
            if (property_exists($record, $key)) {
                switch ($type) {
                    case 'DateTime':
                        $entity->$key = new \DateTime($record->$key);
                        break;
                    
                    default:
                        $entity->$key = $record->$key;
                        break;
                }
            }
            $property->setAccessible(true);
            if (! $property->isInitialized($entity)) {
                return throw new \Exception("Airtable: Missing required field ${key}");
            }
        }
        return $entity;
    }
}

?>
