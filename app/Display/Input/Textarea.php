<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Description of Textarea
 *
 * @author Flicker
 */
class Textarea extends Input
{

    public function __construct()
    {
        parent::__construct("textarea");
    }

    public function render($id, $value, $params = array())
    {
        return "<textarea name='{$id}' id='{$id}' {$this->getEditable($params)}>{$value}</textarea>";
    }

    //put your code here
}
