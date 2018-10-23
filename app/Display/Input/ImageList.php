<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Description of ImageList
 *
 * @author Flicker
 */
class ImageList extends Input
{

    public function __construct()
    {
        parent::__construct("image_list");
    }

    public function render($id, $value, $params = [])
    {
        $urls = explode(',', $value);
        $urls = is_array($urls) ? $urls : [];

        $class = array_key_exists("class", $params) ? "class='{$params["class"]}'" : "";
        $html = "<div id='$id' $class>";
        foreach ($urls as $i => $url) {
            $elem_id = "image" . $i;
            $html .= $this->renderImage(
                $elem_id,
                $url,
                [
                'class' => 'image'
                ]
            );
        }
        $html .= "</div>";

        return $html;
    }

    public function renderImage($id, $value, $params = [])
    {
        $class = array_key_exists("class", $params) ? "class='{$params["class"]}'" : "";
        $element = "<div $class><img src='{$value}' /></div>";
        $element .= "<input name='{$id}' id='{$id}' type='hidden' value='{$value}' readonly/>";

        return $element;
    }
}
