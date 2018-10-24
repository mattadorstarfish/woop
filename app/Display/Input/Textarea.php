<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class Textarea
 * @package Woop\Display\Input
 */
class Textarea extends Input
{
    /**
     * Textarea constructor.
     */
    public function __construct()
    {
        parent::__construct("textarea");
    }

    /**
     * @param string $id
     * @param mixed $value
     * @param array $params
     * @return mixed|string
     */
    public function render($id, $value, $params = array())
    {
        return "<textarea name='{$id}' id='{$id}' {$this->getEditable($params)}>{$value}</textarea>";
    }
}
