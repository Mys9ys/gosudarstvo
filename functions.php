<?php
/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 11.02.2017
 * Time: 18:53
 */

function SelectObjectProperty ($result){
    $specialization = [];
    foreach ($result as $col)
    {
        $array = (array)$col;
        foreach ($array as $col)
        {
            array_push($specialization, $col);
        }
    }
    return $specialization;
}