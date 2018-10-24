<?php

namespace Woop\Factories;

use Woop\Core\Components\Factory;

/**
 * Class ModelFactory
 * @package Woop\Factories
 */
class ModelFactory extends Factory
{
    /**
     * ModelFactory constructor.
     * @param string $className
     */
    public function __construct($className)
    {
        parent::__construct($className);
    }

    /**
     * @param string $className
     * @param array $args
     * @return object
     */
    public static function get($className, $args = [])
    {
        $factory = new ModelFactory($className);
        return $factory->create($args);
    }
}
