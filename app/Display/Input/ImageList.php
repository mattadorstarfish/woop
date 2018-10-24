<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;

/**
 * Class ImageList
 * @package Woop\Display\Input
 */
class ImageList extends Input
{
    /**
     * ImageList constructor.
     */
    public function __construct()
    {
        parent::__construct("image_list");
    }

    /**
     * @param string $id
     * @param mixed $value
     * @param array $params
     * @return mixed|string
     */
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

    /**
     * @param string $id
     * @param mixed $value
     * @param array $params
     * @return string
     */
    public function renderImage($id, $value, $params = [])
    {
        $class = array_key_exists("class", $params) ? "class='{$params["class"]}'" : "";
        $element = "<div $class><img src='{$value}' /></div>";
        $element .= "<input name='{$id}' id='{$id}' type='hidden' value='{$value}' readonly/>";

        return $element;
    }
}
