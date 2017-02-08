<?php

/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 06.02.2017
 * Time: 15:35
 */
abstract class primerORM
{
    static protected $table;

    public static function getTable()
    {
        return static::$table;
    }
}

class NewsModel
    extends primerORM
{
    protected static $table = 'news';
}