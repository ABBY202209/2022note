<?php
//先設一個變數:是一個參數，說明資料庫的設定
//"主機;編碼;資料庫名稱*非資料表";
$DSN = "mysql:host=localhost;charset=utf8;dbname=school";
// $DSN = mysqli_connect('localhost', 'root', '', 'school');
// mysqli_set_charset($DSN, 'utf8');

// $SQL = "SELECT * FROM `students` LIMIT 5";

// $result = mysqli_query($DSN, $SQL);
// $ROWS = mysqli_fetch_all($result, MYSQLI_ASSOC);


//$PDO工具箱
//資料庫的密碼
//new +xxx 是固定用法 
//資料庫設定,使用者帳號,使用者密碼,附加設定(可略)
$PDO = new PDO($DSN, 'root', '');

//動作
//在students 找五筆資料
// $SQL = "SELECT * FROM `students` LIMIT 5";
if (isset($_GET['code'])) {
    $SQL = "SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                 `students`.`name` as '姓名',
                 `students`.`birthday` as '生日',
                 `students`.`graduate_at` as '畢業國中'
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
    $sql_total = "SELECT count(`students`.`id`)
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
} else {
    //建立撈取學生資料的語法，限制只撈取前20筆
    $SQL = "SELECT `students`.`id`,
                 `students`.`school_num` as '學號',
                 `students`.`name` as '姓名',
                 `students`.`birthday` as '生日',
                 `students`.`graduate_at` as '畢業國中'
          FROM `students`";
    $sql_total = "SELECT count(`students`.`id`)
    FROM `students`";
}
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>學生管理系統</h1>
    <nav>
        <a href="add.php">新增學生</a>
        <a href="reg.php">教師註冊</a>
        <a href="login.php">教師登入</a>
    </nav>

    <!-- 根據status來顯示回應 -->
    <?php
    if (isset($_GET[`status`])) {
        switch ($_GET[`status`]) {
            case 'add_success':
                echo "<span style='color:green'>新增學生成功</span>";
                break;
            case 'add_fail':
                echo "<span style='color:red'>新增學生有誤</span>";
                break;
            case 'edit_error':
                echo "<span style='color:red'>無法編輯，請洽管理員，或正確操作</span>";
                break;

                // default:默認
                //     # code...
                //     break;
        }
    }
    ?>

    <!--建立顯示學生列表的表格html語法  -->
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

    <nav>
        <?php
        //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
        $SQL = "SELECT `id`,`code`,`name` FROM `classes`";
        $classes = $PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($classes as $class) {
            echo "<li><a href='?code={$class['code']}'>{$class['name']}</a></li>";
        }
        ?>
    </nav>
    <!-- <a href="./add_student.php">新增</a>
    <a href="./edit_student.php">編輯</a>
    <a href="./del_student.php">刪除</a> -->

    <!-- id 的命名不會用"-" ; "-" 通常用在class-->

    <div>
        <!-- 分頁處理 -->
        <?php
        $div = 10; //一頁筆數
        $total = $PDO->query($sql_total)->fetchColumn(); //算總筆數 count
        echo "總筆數為" . $total;
        $pages = ceil($total / $div); //ceil取整數
        echo "總頁數為" . $pages;
        $now = (isset($_GET['page'])) ? $_GET['page'] : 1;
        echo "當前頁為" . $now;
        $start = ($now - 1) * $div;
        // 1 0 *$div
        // 2 1 *$div
        // 3 2 *$div
        $SQL = $SQL . "LIMIT $start,$div";
        $ROWS = $PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 1; $i < $pages; $i++) {
            if (isset($_GET['code'])) {
                echo "<a href='?page=$i&code={$_GET['code']}'> ";
                echo $i;
                echo " </a>";
            } else {

                echo "<a href='?page=$i'> ";
                echo $i;
                echo " </a>";
            }
        }
        ?>
        <a href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a href="">4</a>
        <a href="">5</a>
    </div>
</body>

</html>