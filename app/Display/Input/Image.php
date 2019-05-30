<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Description of Text
 *
 * @author Flicker
 */
class Image extends Input
{

    public function __construct()
    {
        parent::__construct("image");
    }

    public function render($id, $value, $params = array())
    {
        $class = array_key_exists("class", $params) ? "class='{$params["class"]}'" : "";
        $element = "<div $class><img src='{$value}' /></div>";
        $element .= "<input name='{$id}' id='{$id}' type='hidden' value='{$value}' readonly/>";

        return $element;
    }

    //put your code here
}
