<?php

namespace Woop\Core\Components;

/**
 * Class Factory
 * @package Woop\Core\Components
 */
abstract class Factory
{
    /**
     * @var string Name of the class to instantiate
     */
    public $className;

    /**
     * Factory constructor.
     * @param $className
     */
    public function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * @param array $args
     * @return object
     */
    public function create($args = [])
    {
        $reflectionObj = new \ReflectionClass($this->className);
        $object = $reflectionObj->newInstanceArgs($args);
        return $object;
    }
}
