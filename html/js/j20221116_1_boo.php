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
    $window=[
        'document'=>[
            's1'=>'amy',
            's2'=>'bob',
            's3'=>'cat'
        ],
        'screen'=>[
            's1'=>'amy',
            's2'=>'bob',
            's3'=>'cat'
        ],
        'location'=>[
            'host'=>'',
            's2'=>'bob',
            's3'=>'cat'
        ]
    ]
    ?>
    <script>
        console.log('這是window.location',window.location)
        console.log('這是window.location.host',window.location.host)
    </script>
</body>
</html>