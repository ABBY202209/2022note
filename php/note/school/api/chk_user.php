<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO=new PDO($DSN,'root','');

$acc=$_POST['acc'];
$pw=$_POST['pw'];

?>