<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO=new PDO($DSN,'root','');

$SQL="UPDATE `students` SET `name`='丁于穎',`birthday`='2022-11-14' WHERE `id`='1'";

$RES=$PDO->exec($SQL);
echo "編輯成功".$RES;

?>