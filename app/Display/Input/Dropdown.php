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
class Dropdown extends Input
{

    public function __construct()
    {
        parent::__construct("dropdown");
    }

    public function render($id, $value, $params = array())
    {
        return "<select name='{$id}' id='{$id}' value='{$value}' type='{$this->type}' {$this->getEditable($params)}/>";
    }
}
