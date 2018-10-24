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
    private $name;

    /**
     * @var string $label
     */
    private $label;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var string $inputType
     */
    private $inputType;

    /**
     * @var bool $editable
     */
    private $editable = true;

    /**
     * @var bool $displayable
     */
    private $displayable = true;

    /**
     * FieldConfig constructor.
     * @param string $name
     * @param string $label
     * @param string $type
     * @param string $inputType
     * @param bool $editable
     * @param bool $displayable
     */
    public function __construct($name, $label, $type, $inputType, $editable = true, $displayable = true)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->inputType = $inputType;
        $this->editable = $editable;
        $this->displayable = $displayable;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getInputType()
    {
        return $this->inputType;
    }

    /**
     * @param string $inputType
     */
    public function setInputType($inputType)
    {
        $this->inputType = $inputType;
    }

    /**
     * @return bool
     */
    public function isEditable()
    {
        return $this->editable;
    }

    /**
     * @param bool $editable
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;
    }

    /**
     * @return bool
     */
    public function isDisplayable()
    {
        return $this->displayable;
    }

    /**
     * @param bool $displayable
     */
    public function setDisplayable($displayable)
    {
        $this->displayable = $displayable;
    }
}
