<?php

namespace Woop\Helpers;

/**
 * Class StringHelper
 * @package Woop\Helpers
 */
class StringHelper
{
    /**
     * @param string $string
     * @return string
     */
    public static function firstCharUpper($string)
    {
        $first = strtoupper(substr($string, 0, 1));
        $rest = substr($string, 1);

        return $first . $rest;
    }

    /**
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function contains($haystack, $needle)
    {
        if (strpos($haystack, $needle) === false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param string $string
     * @param string $joinChar
     * @return string
     */
    public static function snakeToReadable($string, $joinChar = '_')
    {
        $final = "";
        $parts = explode($joinChar, $string);
        foreach ($parts as $i => $part) {
            $final .= self::firstCharUpper($part);
            $final .= $i < count($parts) - 1 ? " " : "";
        }

        return $final;
    }

    /**
     * @param string $string
     * @param string $joinChar
     * @return string
     */
    public static function snakeToClass($string, $joinChar = '_')
    {
        $final = "";
        $parts = explode($joinChar, $string);
        foreach ($parts as $i => $part) {
            $final .= self::firstCharUpper($part);
        }

        return $final;
    }

    /**
     * @param string $string
     * @param string $joinChar
     * @return string
     */
    public static function readableToSnake($string, $joinChar = '_')
    {
        $string = strtolower(str_replace(' ', $joinChar, $string));
        return $string;
    }
}
