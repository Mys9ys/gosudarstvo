<?php
$country = new country();
$result=$country->findAll()[0];
?>
<div class="main">
    <div id="contry_name"><?php echo $result->title; ?></div>
    <?php

    if (!isset($result->title)) {
        require_once __DIR__."/firstenter.php";
    } else {
        require_once __DIR__."/regularuser.php";
    }
?>
    <div class="container">
        <?php require_once __DIR__."/humanview.php";
        ?>
    </div>
</div>
