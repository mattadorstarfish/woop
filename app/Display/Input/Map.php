<?php

namespace Woop\Display\Input;

use Woop\Core\Display\Input;
use tapit\helpers\StringHelper;

/**
 * Description of Text
 *
 * @author Flicker
 */
class Map extends Input
{
    public function __construct()
    {
        parent::__construct("map");
    }

    public function render($id, $value, $params = array())
    {
        $class = array_key_exists("class", $params) ? "class='map {$params["class"]}'" : "class='map'";
        $config = array_merge(
            [
            'zoom'=>14
            ],
            $params
        );
        $element = "<div id='$id' {$class}></div>";
        $popup = "<div class='map-popup' id='popup-container'></div>";
        $element .= $popup . $this->getScript($id, $value, $config);

        return $element;
    }

    public function getScript($id, $value, $config = [])
    {
        $json = json_encode($config);
        $objectName = 'map' . StringHelper::snakeToClass($id, '-');
        $js = <<< JS
            jQuery(document).ready(function($) {
                var {$objectName} = new Map('$id', $value, $json);
                {$objectName}.init();
            });
JS;

        return '<script type="text/javascript">' . $js . '</script>';
    }
}
