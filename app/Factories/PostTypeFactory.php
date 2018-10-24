<?php

namespace Woop\Factories;

use Woop\Core\Components\Factory;

/**
 * Class PostTypeFactory
 * @package Woop\Factories
 */
class PostTypeFactory extends Factory
{
    /**
     * PostTypeFactory constructor.
     * @param $className
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
