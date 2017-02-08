<?php

/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 24.01.2017
 * Time: 18:26
 */
class human
{
    public $name;
    public $money;
    public $job;

    function getClassName(){
        echo __CLASS__;
    }

    public function costs($costs){
        $this->money=$this->money-$costs;
        dbupdatemany(human,money,$this->money,name,$this->name);
    }
    public function income($income){
        $this->money=$this->money+$income;
        dbupdatemany(human,money,$this->money,name,$this->name);
    }
}