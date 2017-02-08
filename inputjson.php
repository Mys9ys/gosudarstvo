<?php
require_once __DIR__."/db.php";
require_once __DIR__."/functions.php";
require_once __DIR__."/classes/db.php";
            // работа календаря
$db=new db();
if ($_REQUEST['day']>0)
{
//    $db=new db();
//    $totalday=$_REQUEST['totalday'];
//    $day=$_REQUEST['day'];
//    $month=$_REQUEST['month'];
//    $year=$_REQUEST['year'];
    $db->dbUpdateOne(kalendar,totalday,$_REQUEST['totalday']);
    $db->dbUpdateOne(kalendar,day,$_REQUEST['day']);
    $db->dbUpdateOne(kalendar,month,$_REQUEST['month']);
    $db->dbUpdateOne(kalendar,year,$_REQUEST['year']);
//    $changeday=mysql_query("UPDATE kalendar SET totalday='$totalday', day='$day', month='$month', year='$year' ");
}
            // Создание государства
if (isset($_REQUEST['country_name']))
{
    $workplace=1;
//    $db=new db();
    $country_name=$_REQUEST['country_name'];
    $country=mysql_query("INSERT INTO country (id, title) VALUES ('null', '$country_name')");
    $initializationday=mysql_query("INSERT INTO kalendar (totalday, day, month, year) VALUES ('1', '1', '1', '1') ");
    $db->dbUpdateOne(country,workplace,$workplace);
    $db->dbUpdateOne(country,free_workplace,$workplace);
}
            // все с начала
if ($_REQUEST['reset']==1)
{
//    $db=new db();
    $db->dbDelete(country);
    $db->dbDelete(kalendar);
    $db->dbDelete(human);
    $db->dbDelete(company);
}
            // Создание человечков
if ($_REQUEST['count_creat_human']>0)
{
//    $db=new db();
    $count_human=$_REQUEST['count_creat_human'];
    for($i=1;$i<=$count_human;$i++){
        $inithuman=mysql_query("INSERT INTO human (name) VALUES ('null') ");
    }
    $db->dbUpdateOne(country,population,$count_human);
    $db->dbUpdateOne(country,treasury,$count_human*100);
    $db->dbUpdateOne(country,money_mass,$count_human*100);
}

if ($_REQUEST['select_specialization']==1)
{
    $specialization=$db->dbSelectOne(specialization);
//    $specialization=[];
//    $specialization[id]=1;
    echo json_encode(array("specialization" => $specialization));

}

if ($_REQUEST['company_specialization']>0){
    $name=$_REQUEST['company_name'];
    $abbreviation=$_REQUEST['company_abbreviation'];
    $specialization=$_REQUEST['company_specialization'];
    $country=mysql_query("INSERT INTO company (id, name, abbreviation, specialization) VALUES ('null', '$name', '$abbreviation', '$specialization' )");
}