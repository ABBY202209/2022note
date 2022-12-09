<?php
$DSN = "mysql:host=localhost;charset=utf8;dbname=school";
$PDO = new PDO($DSN, 'root', '');

echo "<pre>";
print_r($_POST);
echo "</pre>";

$id = $_POST['id'];
//建立變數接收表單傳送過來的資料
// $school_num=$_POST['school_num'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$uni_id = $_POST['uni_id'];
$addr = $_POST['addr'];
$parents = $_POST['parents'];
$tel = $_POST['tel'];
$dept = $_POST['dept'];
$graduate_at = $_POST['graduate_at'];
$status_code = $_POST['status_code'];

$sql_students = "UPDATE `students`
                SET `name`='$name', 
                    --`name`={$_POST['name']};
                    `birthday`='$birthday',
                    `uni_id`='$uni_id',
                    `addr`='$addr',
                    `parents`='$parents',
                    `tel`='$tel',
                    `dept`='$dept',
                    `graduate_at`='$graduate_at',
                    `status_code`='$status_code'
                where `id`='$id'";

//學員所屬班級在另一張資料class_student
$class_code = $_POST['class_code'];

$school_num = $PDO->query("SELECT * FROM `students` WHERE `id`='$id'")
                ->fetch(PDO::FETCH_ASSOC);
$class = $PDO->query("SELECT * FROM `class_student` WHERE `school_num`='{$school_num['school_num']}'")
                ->fetch(PDO::FETCH_ASSOC);

$sql_class_student = "UPDATE `class_student`
                     SET `class_code`='$class_code'
                     WHERE `id`='{$class['id']}'";



//預設年度都是2000年
$year = 2000;

//透過SQL語法從class_student資料表中找出某班級的最大座號並加1做為新增的學生的座號
$max_num = $PDO->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn();
$seat_num = $max_num + 1;
//$seat_num=$pdo->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn()+1;

//建立新增學生資料到students資料表的語法並帶入相關的變數
$SQL = "INSERT INTO `students` 
(`id`, `school_num`, `name`, 
 `birthday`, `uni_id`, `addr`, 
 `parents`, `tel`, `dept`, 
 `graduate_at`, `status_code`) VALUES 
(NULL, '$school_num', '$name', 
 '$birthday', '$uni_id', '$addr', 
 '$parents', '$tel', $dept, 
 $graduate_at, '$status_code')";

//建立新增學生所屬班級資料到class_student資料表的語法，並帶入相關的變數
$sql_class = "INSERT INTO `class_student`(`school_num`,`class_code`,`seat_num`,`year`) values('$school_num','$class_code','$seat_num','$year')";

//測試階段可以印出sql語法來確認表單傳送過來的值和處理過的資料是否正確
echo $SQL;
echo "<br>";
echo $sql_class;
echo "<br>";

// $RES=$PDO->exec($SQL);

$res1 = $PDO->exec($SQL);
$res2 = $PDO->ecec($sql_class);
// echo "編輯成功".$RES;

if ($res1 && $res2) {
    $status = 'add_success';
} else {
    $status = 'add_fail';
}
