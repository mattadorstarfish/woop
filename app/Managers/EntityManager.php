<?php

namespace Woop\Managers;

use Woop\Factories\ModelFactory;

/**
 * Class EntityManager
 * @package Woop\Managers
 */
class EntityManager
{
    /**
     * @var array $entities
     */
    public $entities;

    /**
     * @param array $entities
     */
    public function __construct($entities = [])
    {
        $this->entities = [];
        foreach ($entities as $className => $data) {
            if (class_exists($className)) {
                $this->entities[] = ModelFactory::get($className);
            }
        }
    }

    /**
     * @param string $functionName
     */
    public function run($functionName)
    {
        foreach ($this->entities as $entity) {
            call_user_func([$entity, $functionName]);
        }
    }

    /**
     * @return array
     */
    public function getEntities()
    {
        return $this->entities;
    }
}
