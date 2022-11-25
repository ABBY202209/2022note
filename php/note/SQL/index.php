<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //連結
    $link=@mysqli_connect(
        'localhost',
        'root',
        ''
    );
    //確認是否成功
    if (!$link) {
        echo "x<br>";
        exit();
    }else{
        echo "O <br>";
    }
    //關閉連結
    // mysqli_close($link);

    $sql="seltct * from students";
    if ($result=mysqli_query($link,$sql)) {
        
    }
    ?>
</body>
</html>