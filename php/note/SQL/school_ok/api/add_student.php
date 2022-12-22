<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

//建立新增學生資料到students資料表的語法並帶入相關的變數


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

$class_code=$_POST['class_code'];
$year=2000;

$seat_num=$pdo->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn()+1;

// $sql="INSERT INTO `students` 
// (`id`, `school_num`, `name`, 
//  `birthday`, `uni_id`, `addr`, 
//  `parents`, `tel`, `dept`, 
//  `graduate_at`, `status_code`) VALUES 
// (NULL, '915084', '陳彥明', 
//  '1984-06-12', 'F133322235', '新北市泰山區龍華里貴子街100-1號3樓', 
//  '陳國雄', '02-1234567', 3, 
//  5, '001'),
//  (NULL, '915084', '陳彥明', 
//  '1984-06-12', 'F133322235', '新北市泰山區龍華里貴子街100-1號3樓', 
//  '陳國雄', '02-1234567', 3, 
//  5, '001')";
$sql="INSERT INTO `students` 
(`id`, `school_num`, `name`, 
 `birthday`, `uni_id`, `addr`, 
 `parents`, `tel`, `dept`, 
 `graduate_at`, `status_code`) VALUES 
(NULL, '$school_num', '$name', 
 '$birthday', '$uni_id', '$addr', 
 '$parents', '$tel', $dept, 
 $graduate_at, '$status_code')";

$sql_class="INSERT INTO `class_student`(`school_num`,`class_code`,`seat_num`,`year`) values('$school_num','$class_code','$seat_num','$year')";
echo $sql;
echo $sql_class;

//$pdo->query($sql);
$res=$pdo->exec($sql);
$res=$pdo->exec($sql_class);
echo "新增成功:".$res;
?>