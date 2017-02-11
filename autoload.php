<?php
/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 11.02.2017
 * Time: 17:10
 */

function __autoload($class)
{
    if (file_exists(__DIR__ . '/classes/' . $class .'.php')) {
        require __DIR__ . '/classes/' . $class .'.php';
    }
}