<?php
$DSN = "mysql:host=localhost;charset=utf8;dbname=school";
$PDO = new PDO($DSN, 'root', '');

// 資料清理
// trim 將字串的開頭和結尾的空白拿掉
//strip_tags 將標籤拿掉 ex <a>
$acc=trim($_POST['acc']);
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);

$last_login=null;
$level=1;

$SQL="insert into `users`(`acc`,`pw`,`name`,`email`,`last_login`)values('$acc','$pw','$name','$email','$last_login')";

$PDO->exec($SQL);
header("location:../login.php");
?>
