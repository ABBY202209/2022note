<?php
$pdo->exec("DELETE FROM `news` WHERE `id` ='{$_GET['id']}'");

?>