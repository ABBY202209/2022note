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
    dd($indexArr);


    //Associative Arrays
    $assocArr = [
        's1' => 'ab',
        's2' => 'abb',
        's3' => 'abby'
    ];

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
    dd($multiArr);

    //選5隻手機
    //name price 組二維
    //北中南 location 三維
    $mobiall=[[
        'name' => 'apple',
        'price' => '50000',
    ],[
        'name' => 'apple5s',
        'price' => '50000',
    ],[
        'name' => 'applexs',
        'price' => '50000',
    ],[
        'name' => 'apple13',
        'price' => '50000',
    ],[
        'name' => 'apple16',
        'price' => '50000',
    ]

    ];



    ?>

    <script>

    </script>

</body>

</html>