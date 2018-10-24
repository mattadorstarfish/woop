<?php
/**
 * Created by PhpStorm.
 * User: Flicker
 * Date: 2018/08/24
 * Time: 13:50
 */

namespace Woop\Core\Entity;

use Woop\Config\EntityConfig;
use Woop\Core\Entity;

abstract class PostType extends Entity
{
    /**
     * PostType constructor.
     * @param \Woop\Config\EntityConfig $config
     */
    public function __construct(EntityConfig $config)
    {
        parent::__construct($config);
    }

    /**
     * Initialise this entity with any hooks or calls to Wordpress functions needed
     */
    protected function init()
    {
        \register_post_type($this->slug, $this->args);
    }

    /**
     *
     */
    protected function setCapabilities()
    {
        // TODO: Implement setCapabilities() method.
    }

    /**
     * @return array
     */
    abstract public function getFieldConfig();

    /**
     * @return array
     */
    public function getCapabilities()
    {
        return [

        ];
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        $args = parent::getArgs();
        $entity = $this->config->getSlug();

        return array_merge(
            $args,
            [
                'capabilities' => [
                    'publish_posts' => "publish_{$entity}s",
                    'edit_posts' => "edit_{$entity}s",
                    'edit_others_posts' => "edit_others_{$entity}s",
                    'delete_posts' => "delete_{$entity}s",
                    'delete_others_posts' => "delete_others_{$entity}s",
                    'read_private_posts' => "read_private_{$entity}s",
                    'edit_post' => "edit_{$entity}",
                    'delete_post' => "delete_{$entity}",
                    'read_post' => "read_{$entity}",
                ]
            ]
        );
    }
}
