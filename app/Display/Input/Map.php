<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class Map
 * @package Woop\Display\Input
 */
class Map extends Input
{
    public function __construct()
    {
        parent::__construct("map");
    }

    public function render($id, $value, $params = array())
    {
        $element = "<div id='$id'></div>";

        return $element;
    }

}
