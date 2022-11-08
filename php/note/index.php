<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="#">
  <title>萬年曆作業</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /*請在這裹撰寫你的CSS*/

    .cal {
      flex-wrap: wrap;
      width: 100%;
      height: 500px;
      background-color: darkgray;
    }

    a {
      text-decoration: none;
      color: bisque;
    }

    aside {
      border: 1px solid red;
      flex-basis: 20%;
      height: 100px;
    }
    
    nav {
      border: 1px solid blue;
      flex-basis: 60%;


    }
  </style>
</head>

<body>

  <!-- 設定變數 -->
  <?php
  $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");
  $month = (isset($_GET['m'])) ? $_GET['m'] : date("m");
  $Month = (isset($_GET['m'])) ? $_GET['m'] : date("F");
  $day = (isset($_GET['d'])) ? $_GET['d'] : date("d");


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

  //當月1號
  $firstDay = $year . "-" . $month . "-1";
  //N 表示星期中的第幾天
  $firstDayWeek = date("N", strtotime($firstDay));
  // 當月有幾天
  $monthDays = date("t", strtotime($firstDay));
  // 當月最後一天
  $lastDay = $year . '-' . $month . '-' . $monthDays;
  //前面空白
  $spaceDays = $firstDayWeek - 1;
  //一周七天
  $weeks = ceil(($monthDays + $spaceDays) / 7);
  //後面空白 
  $lastSpaceDays = $weeks * 7 - $monthDays - $spaceDays;

  //計算空白
  $cal = [];
  for ($i = 0; $i < $spaceDays; $i++) {
    $cal[] = '';
  }
  //計算天數
  for ($i = 0; $i < $monthDays; $i++) {
    $cal[] = date("m-d", strtotime("+$i days", strtotime($firstDay)));
  }
  //計算後面空白
  for ($i = 0; $i < $lastSpaceDays; $i++) {
    $cal[] = '';
  }


  $today = date("m-d");
  $week = array("mon.", "tue.", "wed.", "thu.", "fri.", "sat.", "sun.");
  $holiday = [
    '01-01' => "元旦",
    '02-28' => "和平紀念日",
    '04-04' => "兒童節",
    '05-01' => "勞動節",
    '09-03' => "軍人節",
    '10-10' => "雙十節",
  ];
  $festival = [
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
  ?>

  <!-- echo -->
  <div class="cal ">
    <header>
      <h1 class="d-flex justify-content-evenly p-2">
        <?= $year; ?>
      </h1>
    </header>

    <div class="d-flex flex-row mb-2 justify-content-center">
      <aside class="d-flex justify-content-end">
        <h1 class="d-flex align-self-center ">
          <?= $Month; ?>
        </h1>
      </aside>
      <nav class="d-flex justify-content-around align-self-en">
        <a href="?y=<?= $prevYear ?>&m=M<?= $prevMonth; ?>">
          <?= $prevMonth; ?>月
        </a>
        <a href="./index.php">
          今天
        </a>
        <a href="?y=<?= $nextYear ?>&m=M<?= $nextMonth; ?>">
          <?= $nextMonth; ?>月
        </a>

      </nav>

    </div>

    <main class="d-flex justify-content-evenly">
      <?php
      /*請在這裹撰寫你的萬年曆程式碼*/


      ?>
      1
    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>