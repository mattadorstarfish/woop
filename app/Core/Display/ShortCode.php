<?php

namespace Woop\Core\Display;

use Woop\Core\Entity;

/**
 * Class ShortCode
 * @package Woop\Core\Display
 */
class ShortCode
{
    /**
     * @var \Woop\Core\Entity $entity
     */
    public $entity;

    /**
     * ShortCode constructor.
     * @param \Woop\Core\Entity $entity
     */
    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Get attributes from the short code string
     * @param array $attributes
     * @return array
     */
    public function getAttributesFromShortCode($attributes)
    {
        return $attributes;
    }

    /**
     * Renders the short code content
     *
     * @return string
     */
    public function render()
    {
        return '';
    }
}
