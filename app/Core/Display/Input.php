<?php

namespace Woop\Core\Display;

/**
 * Description of InputType
 *
 * @author Flicker
 */
abstract class Input
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $id;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var array
     */
    public $options;

    /**
     * Input constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @param $id
     * @param $value
     * @param array $params
     * @return mixed
     */
    public abstract function render($id, $value, $params = []);

    /**
     * @param array $params
     * @return string
     */
    public function getEditable($params = [])
    {
        if (!empty($params) && array_key_exists('editable', $params)) {
            return !$params['editable'] ? 'readonly' : '';
        }

        return '';
    }

    /**
     * @return mixed
     */
    public static function type()
    {
        $class = get_called_class();
        $instance = new $class();
        return $instance->id;
    }
}
