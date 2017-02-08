<?php
require_once __DIR__."/classes/db.php";

function dbselect($table,$selector){
//    $db = new db();
    $dbselect=mysql_query("SELECT * FROM $table ");
    $dbvalue= mysql_fetch_assoc($dbselect);
    return $value=$dbvalue[$selector];
//    return $res=$db->query('SELECT * FROM $table WHERE ')
}

function dbupdateone($table,$selector,$count){
    $update=mysql_query("UPDATE $table SET $selector=$selector+$count ");
}

function dbupdatemany($table,$selector,$count,$dbname,$name){
    $update=mysql_query("UPDATE $table SET $selector=$selector+$count WHERE $dbname=$name ");
}
