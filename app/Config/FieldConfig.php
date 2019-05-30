<?php
/**
 * Created by PhpStorm.
 * User: Flicker
 * Date: 2018/08/24
 * Time: 14:11
 */

namespace Woop\Config;

/**
 * Class FieldConfig
 * @package Woop\Config
 */
class FieldConfig
{
    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $label
     */
    public $label;

    /**
     * @var string $type
     */
    public $type;

    /**
     * @var string $inputType
     */
    public $inputType;

    /**
     * @var bool $editable
     */
    public $editable = true;

    /**
     * @var bool $displayable
     */
    public $displayable = true;
}
