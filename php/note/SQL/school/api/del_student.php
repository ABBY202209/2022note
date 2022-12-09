<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO=new PDO($DSN,'root','');

// $SQL="DELETE FROM `students` WHERE `name`='ABBY'";
$student=$PDO->query("SELECT * FROM `students` where `id`='{$_GET['id']}'")
             ->fetch(PDO::FETCH_ASSOC);
$sql_class="delete from `class_student` where `school_num`='{$student['']}'" ;            
$SQL="DELETE FROM `students` WHERE `id`='{$_GET['id']}'";

// $RES=$PDO->exec($SQL);
echo "刪除成功".$RES;

?>