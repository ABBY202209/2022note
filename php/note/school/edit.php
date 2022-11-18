<?php
$DSN = "mysql:host=localhost;charset=utf8;dbname=school";
$PDO = new PDO($DSN, 'root', '');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編緝學生資料</title>
</head>
<body>
  <h1>編緝學生資料</h1>  
  <?php
  if (isset($_GET['id'])) {
    $SQL="SELECT * FROM `students` WHERE `id`='{$_GET['id']}'";
    $student=$PDO->query($SQL)->fetch(PDO::FETCH_ASSOC);
    // print_r($student);
  }else{
    header("location:index.php?status=edit_error");
  }
  ?>

<form action="api/add_student.php" method="post">
    <table>
        <tr>
            <td>學號</td>
            <td><?=$student['school_num']?></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" value="<?=$student['name'];?>"></td>
        </tr>
        <tr>
            <td>生日</td>
            <td><input type="date" name="birthday" value="<?=$student['birthday'];?>"></td>
        </tr>
        <tr>
            <td>身分證</td>
            <td><input type="text" name="uni_id"value="<?=$student['uni_id'];?>"></td>
        </tr>
        <tr>
            <td>地址</td>
            <td><input type="text" name="addr"value="<?=$student['addr'];?>"></td>
        </tr>
        <tr>
            <td>家長</td>
            <td><input type="text" name="parents" value="<?=$student['parents'];?>"></td>
        </tr>
        <tr>
            <td>電話</td>
            <td><input type="text" name="tel"value="<?=$student['tel'];?>"></td>
        </tr>
        <tr>
            <td>dept</td>
            <td>
                <select name="dept">
                    <?php
                        //從`dept`資料表中撈出所有的科系資料並在網頁上製作成下拉選單的項目
                        $SQL="SELECT * FROM `dept`";
                        $depts=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                        foreach($depts as $dept){
                            echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>graduate_at</td>
            <td>
                <select name="graduate_at" >
                    <?php 
                    //從`graduate_school`t資料表中撈出所有的畢業學生資料並在網頁上製作成下拉選單的項目
                    $SQL="SELECT * FROM `graduate_school`";
                    $grads=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($grads as $grad){
                        echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>status_code</td>
            <td>
                <select name="status_code" >
                    <?php 
                    //從`status`資料表中撈出所有的畢業狀態並在網頁上製作成下拉選單的項目
                    $SQL="SELECT * FROM `status`";
                    $rows=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        echo "<option value='{$row['code']}'>{$row['status']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>班級</td>
            <td>
                <select name="class_code" onchange="upadte.php">
                    <?php
                    //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
                    $SQL="SELECT `id`,`code`,`name` FROM `classes`";
                    $rows=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        echo "<option value='{$row['code']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>                
            </td>
        </tr>
    </table>
    <input type="submit" value="確認修改">
</body>
</html>