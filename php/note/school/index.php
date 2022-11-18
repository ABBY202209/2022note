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
    <!-- 根據status來顯示回應 -->
    <?php
    if (isset($_GET[`status`])) {
        switch ($_GET[`status`]) {
            case 'value':
                case 'value':
                    # code...
                    break;
                break;
            
            default:
                # code...
                break;
        }
    }
    ?>
    <nav>
        <a href="add.php">新增學生</a>
        <a href="reg.php">教師註冊</a>
        <a href="login.php">教師登入</a>
    </nav>
    <a href="./add_student.php">新增</a>
    <a href="./edit_student.php">編輯</a>
    <a href="./del_student.php">刪除</a>
    <?php
    //先設一個變數:是一個參數，說明資料庫的設定
    //"主機;編碼;資料庫名稱*非資料表";
    // $DSN = "mysql:host=localhost;charset=utf8;dbname=school";
    $DSN = mysqli_connect('localhost', 'root', '', 'school');
    mysqli_set_charset($DSN, 'utf8');

    $SQL = "SELECT * FROM `students` LIMIT 5";

    $result = mysqli_query($DSN, $SQL);
    $ROWS = mysqli_fetch_all($result, MYSQLI_ASSOC);


    //$PDO工具箱
    //資料庫的密碼
    //new +xxx 是固定用法 
    //資料庫設定,使用者帳號,使用者密碼,附加設定(可略)
    // $PDO = new PDO($DSN, 'root', '');

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
    // $ROWS = $PDO->query($SQL)->fetchAll();
    // $ROWS = $PDO->query($SQL)->fetch(PDO::FETCH_ASSOC);
    // $ROWS = $PDO->query($SQL)->fetch(PDO::FETCH_ASSOC);


    // echo "<pre>";
    // print_r($ROWS);
    // echo "</pre>";

    ?>
    <!-- id 的命名不會用"-" ; "-" 通常用在class-->
    <table class=list-students>
        <tr>
            <td>學號</td>
            <td>姓名</td>
            <td>生日</td>
            <td>畢業國中</td>
            <td>年齡</td>
            <td>操作</td>
        </tr>
        <?php
        foreach ($ROWS as $ROW) {
            $AGE = round((strtotime('now') - strtotime($ROW['birthday'])) / (60 * 60 * 24 * 365), 1);

            echo "<tr>";
            echo "<td>{$ROW['school_num']}</td>";
            echo "<td>{$ROW['name']}</td>";
            echo "<td>{$ROW['birthday']}</td>";
            echo "<td>{$ROW['graduate_at']}</td>"; //{字串}
            echo "<td>$AGE</td>";
            echo "<td>";
            echo "<a href='edit.php?id={$ROW['id']}'>編輯</a>";
            echo "<a href='del.php?id={$ROW['id']}'>刪除</a>";

            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>