<!-- 先設一個變數:是一個參數，說明資料庫的設定 -->
<?php
//資料庫存取

//物件導向語法
//"主機;編碼;資料庫名稱*非資料表";
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
//$PDO工具箱
//資料庫的密碼
//new +xxx 是固定用法 
//資料庫設定,使用者帳號,使用者密碼,附加設定(可略)
$pdo=new PDO($dsn,'root','');
//動作
//在students 找五筆資料
// 搜尋全部紀錄；在students的資料表；並回傳五筆資料
$sql="SELECT * FROM `students` LIMIT 5";
//$rows=$pdo->執行sql查詢($sql)
$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//呼叫$rows
echo "<pre>";
print_r($rows);
echo "</pre>";

//另一種存取方式
// 函式語法
// $DSN = mysqli_connect('localhost', 'root', '', 'school')///建立資料連接
// or die("無法建立資料連接".mysqli_connect_error());
// mysqli_set_charset($DSN, 'utf8');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<h1>學生管理系統</h1>


</body>
</html>