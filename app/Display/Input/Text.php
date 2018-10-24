<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class Text
 * @package Woop\Display\Input
 */
class Text extends Input
{
    /**
     * Text constructor.
     */
    public function __construct()
    {
        parent::__construct("text");
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
