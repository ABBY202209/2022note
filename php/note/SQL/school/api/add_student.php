<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO=new PDO($DSN,'root','');

//建立變數接收表單傳送過來的資料
$school_num=$_POST['school_num'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$uni_id=$_POST['uni_id'];
$addr=$_POST['addr'];
$parents=$_POST['parents'];
$tel=$_POST['tel'];
$dept=$_POST['dept'];
$graduate_at=$_POST['graduate_at'];
$status_code=$_POST['status_code'];

//學員所屬班級在另一張資料class_student
$class_code=$_POST['class_code'];

//預設年度都是2000年
$year=2000;

//透過SQL語法從class_student資料表中找出某班級的最大座號並加1做為新增的學生的座號
$max_num=$PDO->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn();
$seat_num=$max_num+1;

//建立新增學生資料到students資料表的語法並帶入相關的變數
$SQL="INSERT INTO `students` 
(`id`, `school_num`, `name`, 
 `birthday`, `uni_id`, `addr`, 
 `parents`, `tel`, `dept`, 
 `graduate_at`, `status_code`) VALUES 
(NULL, '$school_num', '$name', 
 '$birthday', '$uni_id', '$addr', 
 '$parents', '$tel', $dept, 
 $graduate_at, '$status_code')";


// $PDO->query($SQL);
$RES=$PDO->exec($SQL);
// echo "新增結果".$RES;

//header 導向 (location 定位:.//外層的某個檔案 ./本層的某個標案)
// header("location:../index.php?studus=add_success");
header("location:../index.php?studus=$status");


?>