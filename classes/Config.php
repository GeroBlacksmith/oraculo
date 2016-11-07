<?php

/**
 * Created by PhpStorm.
 * User: Gero
 * Date: 06/11/2016
 * Time: 01:00 PM
 */
class Config
{
    public static function get($path = null)
    {
        if ($path) {
            $config = $GLOBALS['config'];

            $path = explode('/', $path);

            foreach ($path as $bit) {
                if (isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}