<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="#">
  <title>萬年曆作業</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /*請在這裹撰寫你的CSS*/
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .my-top {
      width: 100%;
      height: 40px;
      background-color: lightblue;
      justify-content: space-around;
      align-items: center;
    }

    .cal {
      display: flex;
      flex-wrap: wrap;
      width: 80%;
      height: 300px;
      margin: auto;
    }

    .cal .date {
      border: 1px solid #999;
      width: calc(100% / 7);
      margin-left: -1px;
      margin-top: -1px;
    }

    .cal .date:hover {
      transform: scale(1.05);
      background-color: lightcyan;
    }

    .holiday {
      background-color: pink;
    }
  </style>
</head>

<body>
  <h1>萬年曆</h1>

  <?php
  /*請在這裹撰寫你的萬年曆程式碼*/
  $cal = [];
  $holiday = ['2022-10-25' => "光復節", "2022-10-10" => "國慶日"]; // 增加特殊日期判斷
  $month = (isset($_GET['m'])) ? $_GET['m'] : date("n"); //n	数字表示的月份，没有前导零
  $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y"); //Y	4 位数字完整表示的年份

  $nextMonth = $month + 1;
  $prevMonth = $month - 1;

  $firstDay = $year . "-" . $month . "-1";
  $firstDayWeek = date("N", strtotime($firstDay)); //N	ISO-8601 格式数字表示的星期中的第几天（PHP 5.1.0 新加）	1（表示星期一）到 7（表示星期天）
  $monthDays = date("t", strtotime($firstDay)); //t 指定的月份有几天
  $lastDay = $year . '-' . $month . '-' . $monthDays;
  $spaceDays = $firstDayWeek - 1;
  $weeks = ceil(($monthDays + $spaceDays) / 7);
  $lastSpaceDays=$weeks*7-$monthDays-$spaceDays;


  $firstDay = $year . "-" . $month . "-1";
  $firstDayWeek = date("N", strtotime($firstDay));
  $monthDays = date("t", strtotime($firstDay));
  $lastDay = $year . '-' . $month . '-' . $monthDays;
  $spaceDays = $firstDayWeek - 1;
  $weeks = ceil(($monthDays + $spaceDays) / 7);

  //echo 前面空白
  for ($i = 0; $i < $spaceDays; $i++) {
    $cal[] = '';
  }
  //echo  當月日期
  for ($i = 0; $i < $monthDays; $i++) {
    $cal[] = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));
  }
  //m	数字表示的月份，有前导零   d 月份中的第几天，有前导零的

  //後面空白
  // for ($i=0; $i < ; $i++) { 
  //   # code...
  // }

  /* echo "<pre>";
print_r($cal);
echo "</pre>"; */

  echo "第一天" . $firstDay . "星期" . $firstDayWeek;
  echo "<br>";
  echo "該月共" . $monthDays . "天,最後一天是" . $lastDay;
  echo "<br>";
  echo "月曆天數共" . ($monthDays + $spaceDays) . "天，" . $weeks . "周";

  ?>

  <div class="d-flex my-top">
    <a href="?y=2022&m=<?= $prevMonth; ?>">上一個月</a>
    <h1 ><?= $year; ?> 年 <?= $month; ?> 月份</h1>
    <a href="?y=2022&m=<?= $nextMonth; ?>">下一個月</a>
  </div>
  <br>

  <div class='cal'>
    <?php
    foreach ($cal as $i => $day) {
      if ($day != "") {
        $show = explode("-", $day)[2];
      } else {
        $show = "";
      }

      if (array_key_exists($day, $holiday)) {

        echo "<div class='date holiday'>";
        echo $show;
        echo "<div>{$holiday[$day]}</div>";
        echo "</div>";
      } else {

        echo "<div class='date'>$show</div>";
      }
    }

    ?>
  </div>



</body>

</html>