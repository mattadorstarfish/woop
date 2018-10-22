<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Description of Text
 *
 * @author Flicker
 */
class Text extends Input
{

    public function __construct()
    {
        parent::__construct("text");
    }

    public function render($id, $value, $params = array())
    {
        return "<input name='{$id}' id='{$id}' type='{$this->type}' value='{$value}' {$this->getEditable($params)}/>";
    }

    //put your code here
}
