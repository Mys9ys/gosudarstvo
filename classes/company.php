<?php

class company
    extends AbstractModel
{
    protected static $table = 'company';

//    public $id;
//    public $name;
//    static $money;

    public function costs($costs){
        echo "отнимаем $this->money <br>";
        $this->money=$this->money-$costs;
        dbupdatemany(human,money,$this->money,name,$this->name);
    }
    public function income($income){
        echo "прибавляем $this->money <br>";
        $this->money=$this->money+$income;
        dbupdatemany(human,money,$this->money,name,$this->name);
    }
}
