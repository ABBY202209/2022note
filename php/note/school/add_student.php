<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO=new PDO($DSN,'root','');



$SQL="INSERT INTO `students` 
(`id`, `school_num`, `name`, `birthday`, `uni_id`, `addr`, `parents`, `tel`, `dept`, `graduate_at`, `status_code`) 
VALUES (NULL, '9720406', 'ABBY', '2022-11-14', 'A123456789', '新北市泰山區貴子里致遠新村','S', '02-12345678','3','5','007')";

$PDO->query($SQL);
echo "新增結果".$RES;



?>