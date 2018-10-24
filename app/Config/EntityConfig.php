<?php

namespace Woop\Config;

/**
 * Class EntityConfig
 * @package Woop\Config
 */
class EntityConfig
{
    /**
     * @var string $name
     */
    private $slug;

    /**
     * @var string $singular
     */
    private $singular;

    /**
     * @var string $plural
     */
    private $plural;

    /**
     * EntityConfig constructor.
     * @param string $slug
     * @param string $singular
     * @param string $plural
     */
    public function __construct($slug, $singular, $plural)
    {
        $this->slug = $slug;
        $this->singular = $singular;
        $this->plural = $plural;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getSingular()
    {
        return $this->singular;
    }

    /**
     * @return string
     */
    public function getPlural()
    {
        return $this->plural;
    }
}
