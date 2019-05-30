<?php

namespace Woop\Core\Entity;

use Woop\Config\EntityConfig;

/**
 * Class Entity
 * @package Woop\Core
 */
abstract class Entity
{
    /**
     * @var string $slug The unique name of this entity, formatted in snake case
     */
    public $slug;

    /**
     *
     * @var \Woop\Config\EntityConfig $config Class containing data about the entity.
     */
    public $config;

    /**
     *
     * @var array $labels Array containing label information.
     */
    public $labels;

    /**
     *
     * @var array $args Array containing arguments data.
     */
    public $args;

    /**
     *
     * @var string $prefix
     */
    public $prefix;

    /**
     * Entity Constructor.
     *
     * @param \Woop\Config\EntityConfig $config Object with properties of the entity to register.
     */
    public function __construct(EntityConfig $config)
    {
        $this->config = $config;
        $this->slug = $config->getSlug();
        $this->labels = $this->getLabels();
        $this->args = $this->getArgs();
        $this->init();
        $this->setCapabilities();
    }

    /**
     * Set the capabilities for this entity
     */
    abstract protected function setCapabilities();

    /**
     * Initialise this entity with any hooks or calls to Wordpress functions needed
     */
    abstract protected function init();

    /**
     * Returns an array of the capabilities that are needed to access this entity
     *
     * @return array
     */
    abstract public function getCapabilities();

    /**
     * @param int $id
     * @return mixed
     */
    public static function find($id)
    {
        return null;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return [
            'labels' => $this->labels,
            'description' => 'Manage ' . $this->config->getPlural() . '.',
            'exclude_from_search' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'show_in_rest' => true,
            'rest_base' => strtolower($this->config->getSlug()),
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        ];
    }

    /**
     * Returns an array containing the label configuration that is required for most Wordpress entities.
     *
     * @return array
     */
    public function getLabels()
    {
        return [
            'name' => $this->config->getPlural(),
            'singular_name' => $this->config->getSingular(),
            'menu_name' => $this->config->getPlural(),
            'name_admin_bar' => $this->config->getSingular(),
            'add_new' => 'Add New ' . $this->config->getPlural(),
            'add_new_item' => 'Add New ' . $this->config->getSingular(),
            'new_item' => 'New ' . $this->config->getSingular(),
            'edit_item' => 'Edit ' . $this->config->getSingular(),
            'view_item' => 'View ' . $this->config->getSingular(),
            'all_items' => 'All ' . $this->config->getPlural(),
            'search_items' => 'Search ' . $this->config->getPlural(),
            'parent_item_colon' => 'Parent ' . $this->config->getPlural() . ':',
            'not_found' => 'No ' . strtolower($this->config->getPlural()) . ' found.',
            'not_found_in_trash' => 'No ' . strtolower($this->config->getPlural()) . ' found in Trash.',
        ];
    }
}
