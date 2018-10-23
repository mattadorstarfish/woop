<?php
/**
 * Created by PhpStorm.
 * User: Flicker
 * Date: 2018/08/24
 * Time: 13:54
 */

namespace Woop\Core\Data;

use Woop\Config\FieldConfig;
use Woop\Core\Display\Field;

/**
 * Class Meta
 * @package Woop\Core\Data
 */
abstract class Meta
{
    /**
     *
     * @var string $slug The slug that uniquely identifies this meta container
     */
    public $slug;

    /**
     *
     * @var string $name
     */
    public $name;

    /**
     *
     * @var string $type
     */
    public $type;

    /**
     *
     * @var Field[] $fields
     */
    public $fields;

    /**
     * @var string $prefix
     */
    protected $prefix = '';

    /**
     *
     * @param string $name
     * @param string $type
     * @param FieldConfig[] $fieldConfig
     * @param string $suffix
     */
    public function __construct($name, $type, $fieldConfig = [], $suffix = '')
    {
        $this->name = $name;
        $this->type = $type;
        $this->slug = $name;

        $this->setFields($fieldConfig);

        $this->init();
    }

    /**
     * Initialise this instance
     */
    abstract public function init();

    /**
     * @param mixed $obj
     */
    abstract public function display($obj);

    /**
     *
     * @param int $id Entity ID.
     * @return null
     */
    abstract public function save($id);

    /**
     * @param array $data
     */
    abstract public function setData($data);

    /**
     * @return array
     */
    abstract public function getData();

    /**
     * @param string $slug
     * @param string $field
     * @param mixed $value
     */
    abstract public function saveField($slug, $field, $value);

    /**
     * @param string $slug
     * @param string $field
     * @param string|null $metaName
     * @param bool $default
     * @return array
     */
    abstract public function retrieveField($slug, $field, $metaName = null, $default = false);

    /**
     *
     * @param String $suffix
     * @param String $join_char
     * @return String
     */
    public function formatName($suffix = '', $join_char = '_')
    {
        $name = strtolower(str_replace(' ', $join_char, $this->name));
        $name .= $suffix !== '' ? $join_char . $suffix : '';
        return $name;
    }

    /**
     *
     *
     * @param FieldConfig[] $fieldConfig
     */
    public function setFields($fieldConfig = [])
    {
        $this->fields = [];
        foreach ($fieldConfig as $config) {
            $this->fields[] = new Field($config);
        }
    }
}
