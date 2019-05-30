<?php

namespace Woop\Core;

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
        $this->slug = $config->name;
        $this->labels = $this->getLabels();
        $this->args = $this->getArgs();
        $this->init();
        $this->setCapabilities();
    }

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
            'description' => 'Manage ' . $this->config->plural . '.',
            'exclude_from_search' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'show_in_rest' => true,
            'rest_base' => strtolower($this->config->name),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
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
            'name' => $this->config->plural,
            'singular_name' => $this->config->singular,
            'menu_name' => $this->config->plural,
            'name_admin_bar' => $this->config->singular,
            'add_new' => 'Add New ' . $this->config->plural,
            'add_new_item' => 'Add New ' . $this->config->singular,
            'new_item' => 'New ' . $this->config->singular,
            'edit_item' => 'Edit ' . $this->config->singular,
            'view_item' => 'View ' . $this->config->singular,
            'all_items' => 'All ' . $this->config->plural,
            'search_items' => 'Search ' . $this->config->plural,
            'parent_item_colon' => 'Parent ' . $this->config->plural . ':',
            'not_found' => 'No ' . strtolower($this->config->plural) . ' found.',
            'not_found_in_trash' => 'No ' . strtolower($this->config->plural) . ' found in Trash.',
        ];
    }
}
