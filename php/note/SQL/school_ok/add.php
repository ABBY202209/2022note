<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');
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
    <!-- 先將所有欄位列出來，再刪減系統可自動填入的欄位 -->
    <!-- <tr>
            <td>id</td>
            <td></td>
        </tr> -->

    <form action="api/add_student.php" method="post">
        <table>
            <tr>
                <td>學號</td>
                <?php
                $sql="SELECT max(`school_num`) FROM `students`";
                $max=$pdo->query($sql)->fetchColumn();

/*              $rows=$pdo->query($sql)->fetchAll();
                $row=$pdo->query($sql)->fetch();

                echo "<pre>";
                echo "fetchColumn";
                echo "<hr>";
                print_r($max);
                echo "fetchAll";
                echo "<hr>";
                print_r($rows);
                echo "fetch";
                echo "<hr>";
                print_r($row);
                echo "</pre>"; */

            ?>
            <td><input type="text" name="school_num" value="<?=$max+1;?>"></td>
        </tr>
                <td><input type="text" name="school_num"></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="date" name="birthday"></td>
            </tr>
            <tr>
                <td>身分證</td>
                <td><input type="text" name="uni_id"></td>
            </tr>
            <tr>
                <td>地址</td>
                <td><input type="text" name="addr"></td>
            </tr>
            <tr>
                <td>家長</td>
                <td><input type="text" name="parents"></td>
            </tr>
            <tr>
                <td>電話</td>
                <td><input type="text" name="tel"></td>
            </tr>
            <tr>
                <td>科別</td>
                <td>
                    <select name="dept">
                        <?php
                        $sql = "SELECT * FROM `dept`";
                        $depts = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);//fetchALL指定返回陣列或是物件;PDO::FETCH_ASSOC 以欄位名稱作為索引鍵(key)
                        foreach ($depts as $dept) {
                            echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>畢業國中</td>
                <td>
                    <select name="graduate_at">
                        <?php
                        $sql = "SELECT * FROM `graduate_school`";
                        $grads = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($grads as $grad) {
                            echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>狀態</td>
                <td>
                    <select name="status_code">
                        <?php
                        $sql = "SELECT * FROM `status`";
                        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($rows as $row) {
                            echo "<option value='{$row['id']}'>{$row['status']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>班級</td>
                <td><input type="text" name="classes"></td>
            </tr>
            <tr>
                <td>座號</td>
                <td><input type="number" name="seat_num"></td>
            </tr>
        </table>
        <input type="submit" value="確認新增">
    </form>
</body>

</html>