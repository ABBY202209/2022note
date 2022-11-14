<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO=new PDO($DSN,'root','');

$SQL="DELETE FROM `students` WHERE `name`='ABBY'";

$RES=$PDO->exec($SQL);
echo "刪除成功".$RES;

?>