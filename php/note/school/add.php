<?php
$DSN="mysql:host=localhost;charset=utf8;dbname=school";
$PDO = new PDO($DSN, 'root', '');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學生</title>
</head>
<body>
  <h1>新增學生</h1>  
  
  <!-- form:post>table>tr*13>td*2 -->
  <form action="api/add_student.php" method="post">
    <table>
        <!-- 先將所有欄位列出來，再刪減系統可自動填入的欄位 -->
        <!-- <tr>
            <td>id</td>
            <td></td>
        </tr> -->
        <tr>
            <td>學號</td>
            <td><input type="text" name="school_num" id=""></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>生日</td>
            <td><input type="date" name="birthday" id=""></td>
        </tr>
        <tr>
            <td>身分證</td>
            <td><input type="number" name="uni_id" id=""></td>
        </tr>
        <tr>
            <td>地址</td>
            <td><input type="text" name="addr" id=""></td>
        </tr>
        <tr>
            <td>家長</td>
            <td><input type="text" name="parents" id=""></td>
        </tr>
        <tr>
            <td>電話</td>
            <td><input type="text" name="tel" id=""></td>
        </tr>
        <tr>
            <td>科別</td>
            <!-- <td><input type="number" name="dept" id=""></td> -->
            <td>
                <select name="dept" id="">
                    <!-- <option value="1">商業經營科</option>
                    <option value="2">國際貿易科</option>
                    <option value="3">資料處理科</option>
                    <option value="4">幼兒保育科</option>
                    <option value="5">美容科</option>
                    <option value="6">室內佈置科</option> -->
                    <?php
                     $SQL="SELECT * FROM `dept`";
                     $depts=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($depts as $dept ) {
                        echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                     }
                    
                    
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>畢業國中</td>
            <!-- <td><input type="number" name="graduate_at" id=""></td> -->
            <td>

                <select name="graduate_at" id="">
                <?php
                         $SQL="SELECT * FROM `graduate_school`";
                         $grads=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                         foreach ($grads as $grad ) {
                            echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
                         }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>status_code</td>
            <td>
                <!-- <input type="number" name="status_code" id=""> -->
                <select name="status_code" id="">
                <?php
                         $SQL="SELECT * FROM `status`";
                         $rows=$PDO->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
                         foreach ($rows as $status ) {
                            echo "<option value='{$status['id']}'>{$status['status']}</option>";
                         }
                        ?>
                </select>

            </td>
        </tr>
        <tr>
            <td>班級</td>
            <td><input type="number" name="" id=""></td>
        </tr>
        <tr>
            <td>座號</td>
            <td><input type="number" name="" id=""></td>
        </tr>
    </table>

    <input type="submit" value="確認新增">
  </form>

</body>
</html>