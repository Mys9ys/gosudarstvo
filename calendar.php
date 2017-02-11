<?php
$calendar = new calendar();
$result=$calendar->findAll()[0];
?>
<div class="kalendar">
    <div class="day"><?php echo  $result->day; ?></div>
    <div class="month"><?php echo $result->month; ?></div>
    <div class="year"><?php echo $result->year; ?></div>
    <button class="nextday" title="следующий день">>></button>
</div>
