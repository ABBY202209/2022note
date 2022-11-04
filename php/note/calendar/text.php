<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <h1>萬年曆測試</h1>
    <?php
    $cal = [];
    // now
    $month = (isset($_GET['m'])) ? $_GET['m'] : date("n"); //n	数字表示的月份，没有前导零
    $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y"); //Y	4 位数字完整表示的年份

    $firstDay = $year . "-" . $month . "-1"; //本月第一天
    $firstDayWeek = date("N", strtotime($firstDay)); //N	ISO-8601 格式数字表示的星期中的第几天（PHP 5.1.0 新加）	1（表示星期一）到 7（表示星期天）
    $monthDays = date("t", strtotime($firstDay)); //t 指定的月份有几天
   
    $nextYear=$year;
    $nextMonth=$month+1;
    if ($nextMonth==12) {
        $nextMonth=1;
        $nextYear=$year+1;
    }
    
    $prevYear=$year;
    $prevMonth=$month-1;
    if ($prevMonth==1) {
        $prevMonth=12;
        $prevYear=$year-1;
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>