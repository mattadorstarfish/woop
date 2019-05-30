<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class Image
 * @package Woop\Display\Input
 */
class Image extends Input
{
    /**
     * Image constructor.
     */
    public function __construct()
    {
        parent::__construct("image");
    }

    /**
     * @param string $id
     * @param mixed $value
     * @param array $params
     * @return mixed|string
     */
    public function render($id, $value, $params = array())
    {
        $class = array_key_exists("class", $params) ? "class='{$params["class"]}'" : "";
        $element = "<div $class><img src='{$value}' /></div>";
        $element .= "<input name='{$id}' id='{$id}' type='hidden' value='{$value}' readonly/>";

        return $element;
    }
}
