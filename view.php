<?php
require_once __DIR__."/functions.php";
?>
<div class="main">
    <div id="contry_name"><?php echo dbselect(country,title); ?></div>
    <?php
    $country_name=dbselect(country,title);
    if (!isset($country_name)) {
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
