<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>學生管理系統</h1>
    <?php
    //先設一個變數:是一個參數，說明資料庫的設定
    //"主機;編碼;資料庫名稱*非資料表";
    // $DSN = "mysql:host=localhost;charset=utf8;dbname=school";
    $DSN=mysqli_connect('localhost','root','school');
    $SQL = "SELECT * FROM `students` LIMIT 5";

    //$PDO工具箱
    //資料庫的密碼
    //new +xxx 是固定用法 
    $PDO = new PDO($DSN, 'root', '');

    //動作
    //在students 找五筆資料
    // $SQL = "SELECT * FROM `students` LIMIT 5";

    //二維陣列
    //到工具箱找工具
    //->瘦箭頭
    //$xxx ->query($xxx) 指定變數傳去資料庫
    //fetchall 拿全部的資料 (二維陣列)
    //fetch (一維陣列)
    //以前是用fot迴圈
    $ROWS = $PDO->query($SQL)->fetchAll();
    // $ROWS = $PDO->query($SQL)->fetch(PDO::FETCH_ASSOC);
    // $ROWS = $PDO->query($SQL)->fetch(PDO::FETCH_ASSOC);


    echo "<pre>";
    print_r($ROWS);
    echo "</pre>";

    ?>

</body>

</html>