<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>新聞管理</h1>
    <a class="btn" href="admin_center.php?do=add_news">新增消息</a>
    <hr>
    <!-- 似table -->
    <ul class="list-group">

        <?php
        $all_news = "SELECT * FROM `news`";
        $rows = $pdo->query($all_news)->fetchAll();

        foreach ($rows as $row) {
            // li 似td
            echo "<li class='list-group-item list-group-item-action d-flex'>";
            
            echo "<div class='col-md-6'>";
            echo $row['subject'];
            echo "</div>";

            echo "<div class='col-md-1'>";
            echo ($row['top']==1)?"TOP":"";
            echo "</div>";

            echo "<div class='col-md-1'>";
            echo $row['readed'];
            echo "</div>";

            echo "<div class='col-md-1'>";
            echo $row['created_at'];
            echo "</div>";

            echo "<div class='col-md-2 text-center'>";
            echo "<a class='btn btn-info mx-2' href='admin_center.php?do=news_edit&id={$row['id']}'>編輯</a>";
            echo "<a class='btn btn-danger mx-2' href='admin_center.php?do=news_del&id={$row['id']}'>刪除</a>";
            echo "</div>";

            echo "</li>";
        }
        ?>
    </ul>

</body>

</html>