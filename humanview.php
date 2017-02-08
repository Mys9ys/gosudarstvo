<?php
$dbh = new PDO('mysql:dbname=gosudarstvo;host=localhost','root', '');
$sth=$dbh->prepare(
    "SELECT * FROM human"
);
$sth->execute();
$result=$sth->fetchAll(PDO::FETCH_CLASS, human);
foreach ($result as $col)
{
    ?><div class="human"><?php echo $col->name;?> <div class="human_hiden" работа><?php echo $col->job ;?>деньги <?php echo $col->money;?></div></div>
<?php
}
