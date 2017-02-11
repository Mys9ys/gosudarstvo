<?php
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/functions.php';

            // работа календаря
if ($_REQUEST['day']>0)
{
    $calendar = new calendar();
    $result=$calendar->findAll()[0];
    $result->totalday = $_REQUEST['totalday'];
    $result->day = $_REQUEST['day'];
    $result->month = $_REQUEST['month'];
    $result->year = $_REQUEST['year'];
    $result->save();
}
            // Создание государства
if (isset($_REQUEST['country_name']))
{
    $workplace=1;
    $country = new country();
    $country->title = $_REQUEST['country_name'];
    $country->workplace = $workplace;
    $country->free_workplace = $workplace;
    $country->save();

    $calendar = new calendar();
    $calendar->totalday = 1;
    $calendar->day = 1;
    $calendar->month = 1;
    $calendar->year = 1;
    $calendar->save();
}
            // все с начала
if ($_REQUEST['reset']==1)
{
    $calendar = new calendar();
    $calendar->delete();

    $country = new country();
    $country->delete();

    $human = new human();
    $human->delete();

    $company = new company();
    $company->delete();
}
            // Создание человечков
if ($_REQUEST['count_creat_human']>0)
{
    $count_human=$_REQUEST['count_creat_human'];

    for($i=1;$i<=$count_human;$i++){
        $human = new human();
        $human->save();
    }
    $country = new country();
    $result=$country->findAll()[0];
    $result->population = $result->population + $count_human;
    $result->treasury = $result->treasury + $count_human*100;
    $result->money_mass = $result->money_mass + $count_human*100;
    $result->save();
}
            //запрос к бд о специализации компании
if ($_REQUEST['select_specialization']==1)
{
    $find = new specialization();
    $result = $find->findAll();
    $array = SelectObjectProperty($result);
    echo json_encode(array("specialization" => $array));
}
            //Запрос к бд по шаблонам компаний
if ($_REQUEST['sampleCompany']==1)
{
    $sampleCompany = new sampleCompany();
    $result = $sampleCompany->findAll();
    $array = SelectObjectProperty($result);
    echo json_encode(array("sampleCompany" => $array));

}
            // Создание компании
            // Из шаблонов
if ($_REQUEST['sample_company']>0)
{
    $sampleCompany = new sampleCompany();
    $result = $sampleCompany->findOneByPK($_REQUEST['sample_company']);
    $company = new company();
    $company->name = $result->name;
    $company->abbreviation = $result->abbreviation;
    $company->specialization =  $result->specialization;
    $company->save();

    $country = new country();
    $result=$country->findAll()[0];
    $result->firms = $result->firms + 1;
    $result->save();

//    $id[id]=$_REQUEST['sample_company'];
//    $sample=$db->dbSelectOne('sample_company',$id);
//    $name=$sample->name;
//    $abbreviation=$sample->abbreviation;
//    $find=$sample->specialization;
//    $country = mysql_query("INSERT INTO company (id, name, abbreviation, specialization) VALUES ('null', '$name', '$abbreviation', '$find' )");
//    $db->dbUpdateOne('country','firms','+1');
}
else
{           //создание новой
    if ($_REQUEST['company_specialization'] > 0) {
        $company = new company();
        $company->name = $_REQUEST['company_name'];
        $company->abbreviation = $_REQUEST['company_abbreviation'];
        $company->specialization =  $_REQUEST['company_specialization'];
        $company->save();

        $country = new country();
        $result=$country->findAll()[0];
        $result->firms = $result->firms + 1;
        $result->save();
    }
}