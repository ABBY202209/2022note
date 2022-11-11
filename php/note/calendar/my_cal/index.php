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
    *{
      /* font-family:'Noto Sans TC',sans-serif !important; */
      /* font-family:'cwTeXYen', sans-serif; */
      
    }
    .top{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

    }
    .cal {
      
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

    }

    nav {
      border: 1px solid blue;

    }
  </style>
</head>

<body>

  <!-- 設定變數 -->
  <?php
  $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");
  $month = (isset($_GET['m'])) ? $_GET['m'] : date("m");
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
    <div class="top">
      <?= $year; ?>
      <h1>
        <?= $month; ?>
      </h1>

    </div>

    <div class="d-flex row mb-2 justify-content-center">
      <aside class="d-flex justify-content-end col-4 flex-column ">

        <select class="form-select form-select-sm" aria-label=".form-select-sm example">


          <?php
          foreach ($year as $date) { ?>
            <option value="<?php echo $date ?>" <?php if ($year == $date) echo 'selected="selected"' ?><?php echo $date ?>></option>
          <?php } ?>



          <?php
          foreach ($year as $date) { ?>
            <option value="<?php echo $date ?>" <?php if ($year == $date) echo 'selected="selected"' ?><?php echo $date ?>></option>
          <?php } ?>

        </select>
      </aside>

      <nav class="d-flex justify-content-around align-items-end  col-6 ">

        <a href="?y=<?= $prevYear ?>&m=<?= $prevMonth; ?>" class="btn btn-outline-light ">
          <?= $prevMonth; ?>月
        </a>


        <a href="./index.php" class=" btn btn-lg">
          今天
        </a>

        <a href="?y=<?= $nextYear ?>&m=<?= $nextMonth; ?>" class="btn btn-outline-light ">
          <?= $nextMonth; ?>月
        </a>



      </nav>
      <div class="btn-group me-2 col-6 btn-group-sm" role="group" aria-label="First group">
        <button type="button" class="btn btn-outline-secondary">
          <a href="?y=<?= $Year ?>&m=1">1</a>
        </button>
        <button type="button" class="btn btn-outline-secondary">2</button>
        <button type="button" class="btn btn-outline-secondary">3</button>
        <button type="button" class="btn btn-outline-secondary">4</button>
      </div>

    </div>

    <main class="cal d-flex  justify-content-evenly grid text-center" style="--bs-columns: 4; --bs-gap: 5rem;">
      <?php
      /*請在這裹撰寫你的萬年曆程式碼*/
      $week = array("mon.", "tue.", "wed.", "thu.", "fri.", "sat.", "sun.");
      for ($i = 0; $i < 7; $i++) {
        echo "<div class='week mt-2 border'>";
        echo $week[$i];
        echo "<div>&nbsp</div>";
        echo "</div>";
      }

      foreach ($cal as $i => $day) {
        if ($day != "") {
          $show = explode("-", $day)[1];
        } else {
          $show = "";
        }
        if (array_key_exists($day, $holiday)) {

          echo "<div class='date holiday '>";
          echo $show;
          echo "<div>{$holiday[$day]}</div>";
          echo "</div>";
        } else if ($day == $today) {
          echo "<div class='date' style='background-color: lightcyan;'>" . substr($day, 3) . "</div>";
        } else {
          echo "<div class='date' >" . substr($day, 3) . "</div>";
        }
      }

      ?>

    </main>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>