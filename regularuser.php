<?php
require_once __DIR__ . "/calendar.php";
$calendar = new calendar();
$result=$calendar->findAll()[0];
$country = new country();
$countryRes=$country->findAll()[0];
?>
<button id="reset">Заново</button>
<button id="view_create_company">Создать компанию</button>
<?php
if ($result->totalday==1 && $countryRes->population==0)
    {?>
    <div id="human_create_box">
        <h4>Введите начальное количество человечков</h4>
        <input id="count_creat_human" type="number" value="20">
        <button id="create_human">Создать</button>
    </div>
<?php
    } ?>
<div id="company_create_box">
    <h4>Введите название фирмы</h4>
    <input id="company_name" type="text" placeholder="Название...">
    <h4>Введите аббревиатуру</h4>
    <input id="company_abbreviation" type="text" placeholder="Сокращение...">
    <h4>Выберите специализацию</h4>
    <select id="company_specialization"></select>
    <h4>Выбрать из списка</h4>
    <select id="sample_company"><option value="0">Выбрать</option></select>
    <button id="create_company">Создать</button>
</div>
