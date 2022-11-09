<?php 
    echo"<h1>單行</h1>";
    // echo 單行輸出
    echo '王小明<br>';
    echo '王小明<br>';
    echo '王小明<br>';

    echo" <h1>for 輸出</h1>";
    for ($i=1; $i <=3 ; $i++) { 
        echo '王小明 for <br>';
    }

    echo" <h1>function 印章刻好</h1>";
    // function 印章刻好
    function printName(){
        echo '王小明 function <br>';
        for ($i=1; $i <=3 ; $i++) { 
            echo '王小明 for + function <br>';
        }
    }

    echo" <h1>function 印章(名字)</h1>";
    // 印章(名字)
    function printMyName($name){
        echo "<h1>$name function</h1> <br>";
        for ($i=1; $i <=3 ; $i++) { 
            echo "$name for + function <br>";
        }
    }
    echo" <h1>function 印章(名字,印幾次)</h1>";

    // 印章(名字,印幾次)
    function printMyNameMyNum($name,$num){
        echo "<h2>$name function</h2> <br>";
        for ($i=1; $i <= $num ; $i++) { 
            echo "$name for + function <br>";
        }
    }

    // 呼叫印章
    printName();
    printMyName('魔獸');

    printMyNameMyNum('魔獸好棒棒',10);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello php</h1>
    <p>
         <?php 
          printName();
          printMyName('魔獸');
          printMyNameMyNum('魔獸好棒棒',10);
         ?>
    </p>
</body>
</html>