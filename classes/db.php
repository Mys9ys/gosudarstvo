<?php

/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 06.02.2017
 * Time: 16:26
 */

/**
 * Class db
 * @property
 */
class db
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=gosudarstvo;host=localhost','root', '');
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();
    }
    public function dbSelectOne($table)
    {
        $sql="SELECT * FROM $table";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function dbUpdateOne($table,$selector,$value)
    {
        $sql="UPDATE $table SET $selector=:$selector";
        $sth=$this->dbh->prepare($sql);
        $execute=[];
        $execute[':'.$selector]=$value;
        $sth->execute($execute);
    }

    public function dbDelete($table)
    {
        $sql="DELETE FROM $table";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
    }
}