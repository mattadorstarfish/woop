<?php

namespace Woop\Core\Display;

use Woop\Config\FieldConfig;
use Woop\Display\Input\Text;
use Woop\Helpers\StringHelper;

/**
 * Class Field
 * @package Woop\Core\Display
 */
class Field
{
    /**
     * @var array $scenarios
     */
    public $scenarios;

    /**
     *
     * @var string $id
     */
    public $slug;

    /**
     *
     * @var string $name
     */
    public $name;

    /**
     *
     * @var string $label
     */
    public $label;

    /**
     *
     * @var string $type
     */
    public $type;

    /**
     *
     * @var string $input_type
     */
    public $inputType;

    /**
     *
     * @var array $config
     */
    public $config;

    /**
     *
     * @var string $value
     */
    public $value;

    /**
     *
     * @var string $scenario
     */
    public $scenario;

    /**
     *
     * @var string $prefix
     */
    protected $prefix = '';

    /**
     *
     * @param \Woop\Config\FieldConfig $config
     */
    public function __construct(FieldConfig $config)
    {
        $this->config = $config;
        $this->name = $config->getName();
        $this->label = $config->getLabel() && $this->getLabel($this->name);
        $this->slug = $this->prefix . $this->formatName();
        $this->type = $config->getType();
        $this->inputType = $config->getInputType();
    }

    /**
     *
     * @param string $break
     * @return string
     */
    public function getInput($break = '<br/>')
    {
        $html = "";

        if ($this->isDisplayable()) {
            $element = $this->getInputElement();
            $html = "<label for='{$this->slug}'><strong>{$this->label}</strong></label>" . $break;
            $html .= $element . $break;
        }

        return $html;
    }

    /**
     *
     * @param string $suffix
     * @param string $join_char
     * @return string
     */
    public function formatName($suffix = '', $join_char = '_')
    {
        $name = strtolower(str_replace(' ', $join_char, $this->name));
        $name .= $suffix !== '' ? $join_char . $suffix : '';
        return $name;
    }

    /**
     *
     * @param string $name
     * @return string
     */
    public function getLabel($name)
    {
        $displayName = "";
        $parts = explode("_", $name);
        $length = count($parts);
        foreach ($parts as $i => $part) {
            $displayName .= StringHelper::firstCharUpper($part);
            $displayName .= $i === $length - 1 ? '' : ' ';
        }

        return $displayName;
    }

    /**
     *
     * @return string
     */
    public function getInputElement()
    {
        $input = $this->getInputObject($this->inputType);
        $element = $input->render($this->slug, $this->value, $this->config);

        return $element;
    }

    /**
     * @param $type
     * @param string $namespace
     * @return \Woop\Core\Display\Input
     */
    public function getInputObject($type, $namespace = '\Woop\Display\Input\\')
    {
        $class = $namespace . StringHelper::snakeToClass($type);
        if (class_exists($class)) {
            return new $class();
        }

        return new Text();
    }

    /**
     *
     * @return bool
     */
    public function isEditable()
    {
        return $this->config->isEditable();
    }

    /**
     * @return bool
     */
    public function isDisplayable()
    {
        return $this->config->isDisplayable();
    }
}
