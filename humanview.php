<?php
require_once __DIR__ . '/classes/human.php';
$human = new human();
$result=$human->findAll();
foreach ($result as $col)
{
    ?><div class="human"><?php echo $col->id;?> <div class="human_hiden" работа><?php echo $col->job;?>деньги <?php echo $col->money;?></div></div>
<?php
}
