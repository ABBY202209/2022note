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
    /* * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    } */

    .my-top {
      width: 100%;
      height: 50px;
      background-color: lightblue;
      justify-content: space-around;
      align-items: center;
    }

    .cal {
      display: flex;
      flex-wrap: wrap;
      width: 80%;
      height: 400px;
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

    .week {
      border: 1px solid #999;
      width: calc(100% / 7);
      margin-left: -1px;
      margin-bottom: -1px;
      height: 40px;
      text-align: center;

    }
  </style>
</head>

<body>
  <h1>萬年曆</h1>
  <a href="./text.php">測試</a>

  <?php
  /*請在這裹撰寫你的萬年曆程式碼*/
  $cal = [];
  $holiday = [
    '01-01' => "元旦",
    '02-28' => "和平紀念日",
    '04-04' => "兒童節",
    '05-01' => "勞動節",
    '09-03' => "軍人節",
    '10-10' => "雙十節",
  ]; // 增加特殊日期判斷
  $festival=[
    '03-08' => "婦女節",
    '03-12' => "國父逝世紀念日",
    '03-14' => "反侵略日",
    '03-29' => "青年節",
    '07-15' => "解嚴紀念日",
    '09-28' => "教師節",
    '10-24' => "聯合國日",
    '10-25' => "光復節",
    '11-12' => "國父誕辰紀念日",
    '12-25' => "行憲紀念日",
    
  ];

  $month = (isset($_GET['m'])) ? $_GET['m'] : date("n");
  // isset 參數arg的值非null，就回傳true，否則就回傳false
  //n	数字表示的月份，没有前导零
  $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y"); //Y	4 位数字完整表示的年份

  // $nextMonth = $month + 1;
  // $prevMonth = $month - 1;

  $nextYear = $year;
  $nextMonth = $month + 1;
  if ($month == 12) {
    $nextMonth = 1;
    $nextYear = $year + 1;
  }

  $prevYear = $year;
  $prevMonth = $month - 1;
  if ($month == 1) {
    $prevMonth = 12;
    $prevYear = $year - 1;
  }


  $firstDay = $year . "-" . $month . "-1"; //本月第一天
  $firstDayWeek = date("N", strtotime($firstDay)); //N	ISO-8601 格式数字表示的星期中的第几天（PHP 5.1.0 新加）	1（表示星期一）到 7（表示星期天）
  $monthDays = date("t", strtotime($firstDay)); //t 指定的月份有几天
  $lastDay = $year . '-' . $month . '-' . $monthDays;
  $spaceDays = $firstDayWeek - 1;
  $weeks = ceil(($monthDays + $spaceDays) / 7);
  $lastSpaceDays = $weeks * 7 - $monthDays - $spaceDays;
  $today = date("m-d");



  //前面空白
  for ($i = 0; $i < $spaceDays; $i++) {
    $cal[] = '';
  }
  //當月天數
  for ($i = 0; $i < $monthDays; $i++) {
    // $cal[] = date("Y-m-d", strtotime("+$i days", strtotime($firstDay)));
    $cal[] = date("m-d", strtotime("+$i days", strtotime($firstDay)));
  }
  //m	数字表示的月份，有前导零   d 月份中的第几天，有前导零的

  // 後面空白
  for ($i = 0; $i < $lastSpaceDays; $i++) {
    $cal[] = '';
  }

  /* echo "<pre>";
print_r($cal);
echo "</pre>"; */

  echo "第一天" . $firstDay . "星期" . $firstDayWeek;
  echo "<br>";
  echo "該月共" . $monthDays . "天,最後一天是" . $lastDay;
  echo "<br>";
  echo "月曆天數共" . ($monthDays + $spaceDays) . "天，" . $weeks . "周";
  echo "<br>";
  echo $today;


  ?>


  <!-- <div class="d-flex my-top">
  <a href="?y=2022&m=<?= $prevMonth; ?>">上一個月</a>
  <h1 ><?= $year; ?> 年 <?= $month; ?> 月份</h1>
  <a href="?y=2022&m=<?= $nextMonth; ?>">下一個月</a>
</div> -->

  <!-- header -->
  <div class="d-flex my-top">
    <a href="?y=<?= $prevYear ?>&m=<?= $prevMonth; ?>">上一個月</a>
    <h1><?= $year; ?> 年 <?= $month; ?> 月份</h1>
    <a href="?y=<?= $nextYear ?>&m=<?= $nextMonth; ?>">下一個月</a>
  </div>



  <div class='cal'>
    <?php

    $week = array("mon.", "tue.", "wed.", "thu.", "fri.", "sat.", "sun.");
    for ($i = 0; $i < 7; $i++) {
      echo "<div class=' week mt-2  '>";
      echo $week[$i];
      echo "<div>&nbsp</div>";
      echo "</div>";
    }


    foreach ($cal as $i => $day) {
      if ($day != "") { // !=  不等於
        $show = explode("-", $day)[1];
      } else {
        $show = "";
      }
      if (array_key_exists($day, $holiday)) {

        echo "<div class='date holiday '>";
        echo $show;
        echo "<div>{$holiday[$day]}</div>";
        echo "</div>";
        // } else {
        // echo $show;
        // echo "<div>&nbsp</div>";
        // echo "</div>";

        //   echo "<div class='date'>";
        // }
      } else if ($day == $today) {
        echo "<div class='date' style='background-color: lightcyan;'>" . substr($day, 3) . "</div>";
      } else {
        echo "<div class='date' >" . substr($day, 3) . "</div>";
      }
    }




    ?>
  </div>



</body>

</html>