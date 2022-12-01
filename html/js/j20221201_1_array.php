<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <h1>array</h1>
    <?php
    //function
    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    //Indexed Arrays
    $indexArr = ['a', 'b', 'c']; //key未指定時預設從0開始
    echo '<hr>';
    dd($indexArr);
    //指定回傳值
    dd($indexArr[0]);
    dd($indexArr[1]);
    dd($indexArr[2]);


    //Associative Arrays
    $assocArr = [
        's1' => 'ab',
        's2' => 'abb',
        's3' => 'abby'
    ];
    echo '<hr>';
    //設定key值並回傳
    dd($assocArr['s1']);
    dd($assocArr['s2']);
    dd($assocArr['s3']);

    //多維array
    //Multidimensional Arrays
    $multiArr = [[
        's1' => 'ab',
        's2' => 'abb',
        's3' => 'abby'
    ], [
        's1' => 'ab',
        's2' => 'abb',
        's3' => 'abby'
    ]];
    echo '<hr>';
    dd($multiArr);

    //選5隻手機
    //name price 組二維
    //北中南 location 三維
    $mobileArr = [[
        'name' => 'apple',
        'price' => '50000',
        'location' => ['北', '中', '南'] //三維
    ], [
        'name' => 'apple5s',
        'price' => '50000',
        'location' => ['北', '中', '南']
    ], [
        'name' => 'applexs',
        'price' => '50000',
        'location' => ['北', '中', '南']
    ], [
        'name' => 'apple13',
        'price' => '50000',
        'location' => ['北', '中', '南']
    ], [
        'name' => 'apple16',
        'price' => '50000',
        'location' => ['北', '中', '南']
    ]];
    dd($mobileArr); //function

    foreach ($mobileArr as $key => $value) {
        echo '<hr>';
        dd($value);
    }



    ?>

    <script>
        //array
        //第一種宣告方式：語法
        let arr=[
            1,2,3
        ];
        console.log(arr);

        //第二種：用function
        let arr2 =new Array(4,5,6);
        console.log(arr2);
        console.log(arr2[0]);
        console.log(arr2[1]);
        console.log(arr2[2]);

    </script>

</body>

</html>