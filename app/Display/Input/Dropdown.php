<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class Dropdown
 * @package Woop\Display\Input
 */
class Dropdown extends Input
{

    /**
     * Dropdown constructor.
     */
    public function __construct()
    {
        parent::__construct("dropdown");
    }

    /**
     * @param string $id
     * @param mixed $value
     * @param array $params
     * @return mixed|string
     */
    public function render($id, $value, $params = array())
    {
        return "<select name='{$id}' id='{$id}' value='{$value}' type='{$this->type}' {$this->getEditable($params)}/>";
    }
}
