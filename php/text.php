<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>陣列</h1>
    <?php
    $str = "day";
    echo $str[0];
    $str[0] = "p";
    echo $str;

    ?>

    <h1>變數</h1>
    <h3>參照指派</h3>
    <?php
    $var1 = "abby";
    $val2 = &$val1;
    $val2 = "abby2";
    echo $val2;
    echo $val1;
    ?>
    <h3>可變動變數</h3>
    <?php
    $var = "happy";
    $$var = "birthday";
    echo $var;
    echo $$var;
    echo $happy;
    ?>

    <h1>常數</h1>
    <?php
    define("pl", 3.14);
    $radius = 10;
    $area = pl * $radius * $radius;
    echo $area;
    ?>
    <h1>遞增/減運算子</h1>
    <?php
    $a=10;
    echo (++$a);//先將$a++，然後再echo
    echo $a;
    $b=5;
    echo ($b++); //先顯示$b，然後再將$b++
    echo $b;
    ?>


</body>

</html>