<html>
<head>
    <link href="main.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type='text/javascript' src='script.js'></script>
</head>
<body>
<?php
require_once __DIR__."/db.php";
require_once __DIR__."/classes/human.php";
require_once __DIR__."/view.php";
require_once __DIR__."/classes/db.php";

$db = new db();
$specialization=$db->dbSelectOne(specialization);
//echo "<PRE>";
//var_dump($specialization);
//die;
//foreach ($specialization as $key => $value)
//{
//    echo "ключ: $key значение: $value";
////    $array[$key]=$value;
//}
echo "<PRE>";
var_dump($specialization);
//echo json_encode(array("specialization" => $specialization));
//echo "<PRE>";
//$title=$result['title'];
//print_r($specialization);
//var_dump($result);
//$title=$result->title;
//echo $title;
//var_dump($title);


$human = new human();
$human->name = '431';
$human->costs(5);
//$human->income(10);
//$human->costs(7);
//$human->income(12);
$human->getClassName();
echo "<pre>";
var_dump($human);
$human = new human();
$human->name = '331';
$human->getClassName();
$human->income(10);
echo "<pre>";
var_dump($human);

?>
<h4><?php echo "$human->money"?></h4>

</body>
</html>