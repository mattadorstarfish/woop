<?php

namespace Woop\Data;

use Woop\Core\Data\Meta;

/**
 * Class PostMeta
 * @package Woop\Data
 */
class PostMeta extends Meta
{
    /**
     * PostMeta constructor.
     * @param string $name
     * @param string $type
     * @param \Woop\Config\FieldConfig[] $fields
     * @param $suffix
     */
    public function __construct($name, $type, $fields = [], $suffix = '')
    {
        parent::__construct($name, $type, $fields, $suffix);
    }

    /**
     * Initialise this instance
     */
    public function init()
    {
        \add_action('add_meta_boxes', [$this, 'add']);
        \add_action('save_post', [$this, 'save'], 10, 2);
    }

    /**
     * @param mixed $obj
     */
    public function display($obj)
    {
        $html = "";
        $data = get_post_meta($obj->ID, $this->slug, true);
        $this->setData($data);
        wp_nonce_field($this->formatName('action'), $this->formatName('nonce'));
        foreach ($this->fields as $field) {
            $html .= $field->getInput();
        }

        echo $html;
    }

    /**
     *
     * @param int $id Entity ID.
     * @return bool
     */
    public function save($id)
    {
        // Add nonce for security and authentication.
        $nonce_name = isset($_POST[$this->formatName('nonce')]) ? $_POST[$this->formatName('nonce')] : '';
        $nonce_action = $this->formatName('action');

        // Check if nonce is set.
        if (!isset($nonce_name)) {
            return false;
        }

        // Check if nonce is valid.
        if (!wp_verify_nonce($nonce_name, $nonce_action)) {
            return false;
        }

        // Check if user has permissions to save data.
        if (!current_user_can('edit_post', $id)) {
            return false;
        }

        // Check if not an auto save.
        if (wp_is_post_autosave($id)) {
            return false;
        }

        // Check if not a revision.
        if (wp_is_post_revision($id)) {
            return false;
        }

        $data = $this->getData();
        $oldData = get_post_meta($id, $this->slug, true);
        update_post_meta($id, $this->slug, $data, $oldData);

        return true;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $data = gettype($data) == 'array' ? $data : [];
        foreach ($this->fields as $field) {
            if (array_key_exists($field->slug, $data)) {
                $field->value = $data[$field->slug];
            }
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = [];

        foreach ($this->fields as $field) {
            $value = null;
            if (array_key_exists($field->slug, $_POST)) {
                $value = $_POST[$field->slug];
            }
            if (!empty($value)) {
                $data[$field->slug] = $value;
            }
        }

        return $data;
    }

    /**
     * @param int $id
     * @param string $field
     * @param mixed $value
     */
    public function saveField($id, $field, $value = null)
    {
        $newData = get_post_meta($id, $this->slug, true);
        $oldData = $newData = is_array($newData) ? $newData : [];

        $newData[$field] = $value;
        update_post_meta($id, $this->slug, $newData, $oldData);
    }

    /**
     * @param int $id
     * @param string $field
     * @param string|null $metaName
     * @param bool $default
     * @return mixed|bool
     */
    public function retrieveField($id, $field, $metaName = null, $default = false)
    {
        $metaName = $metaName === null ? $this->slug : $metaName;
        $data = get_post_meta($id, $metaName, true);
        if (array_key_exists($field, $data)) {
            return $data[$field];
        }

        return $default;
    }
}
