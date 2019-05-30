<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class Date
 * @package Woop\Display\Input
 */
class Date extends Input
{
    /**
     * Date constructor.
     */
    public function __construct()
    {
        parent::__construct("date");
    }

    /**
     * @param string $id
     * @param mixed $value
     * @param array $params
     * @return mixed|string
     */
    public function render($id, $value, $params = array())
    {
        return "<input name='{$id}' id='{$id}' type='{$this->type}' value='{$value}' {$this->getEditable($params)}/>";
    }
}
