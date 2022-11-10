<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /*請在這裹撰寫你的CSS*/

        .main {
            border: 1px solid palegreen;
        }

        .header {
            display: flex;
            background-color: cadetblue;
            flex-wrap: wrap;
            margin: auto;
            width: 80%;
            font-weight: 1000;

        }

        .cal {
            border: 1px solid green;
            display: flex;
            flex-wrap: wrap;
            width: 80%;
            height: 500px;
            margin: auto;

        }

        .basemap {
            width: 15%;
        }

        .left {
            flex-direction: column;
            display: flex;
            width: 5%;
            z-index: 2;
            margin-left: -5%;

        }

        .day {
            width: 80%;
            display: flex;
            flex-wrap: wrap;
        }

        .date {
            border: 1px solid #999;
            width: calc(100% / 7);
            margin-left: -1px;
            margin-top: -1px;
        }

        .cal .date:hover {
            transform: scale(1.05);
            background-color: lightcyan;
        }

        .left .btn:hover {
            transform: scale(1.05);
            background-color: ;
        }

        .holiday {
            background-color: pink;
        }
    </style>
</head>

<body>
    <?php
    /*請在這裹撰寫你的萬年曆程式碼*/

    $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");
    $month = (isset($_GET['m'])) ? $_GET['m'] : date("m");


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
    $firstDayWeek = date("N", strtotime($firstDay)); //N  1（表示星期一）到 7（表示星期天）
    $monthDays = date("t", strtotime($firstDay)); //t 指定的月份天數
    $lastDay = $year . '-' . $month . '-' . $monthDays;
    $spaceDays = $firstDayWeek - 1;
    $weeks = ceil(($monthDays + $spaceDays) / 7);
    $lastSpaceDays = $weeks * 7 - $monthDays - $spaceDays;
    $today = date("Y-m-d-N");

    $cal = [];
    //前面空白
    for ($i = 0; $i < $spaceDays; $i++) {
        $cal[] = '';
    }
    //當月天數
    for ($i = 0; $i < $monthDays; $i++) {
        $cal[] = date("Y-m-d-N", strtotime("+$i days", strtotime($firstDay)));
    }
    // 後面空白
    for ($i = 0; $i < $lastSpaceDays; $i++) {
        $cal[] = '';
    }

    // 增加特殊日期判斷
    $holiday = [
        '01-01' => "元旦",
        '02-28' => "和平紀念日",
        '04-04' => "兒童節",
        '05-01' => "勞動節",
        '09-03' => "軍人節",
        '10-10' => "雙十節",
    ];
    $TWN = [
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

    <div class="main">
        <div class="header">
            <?= $year; ?>

            <nav class="d-flex justify-content-around align-items-end  col-12 ">
                <h1 class="col-3">
                    <?= $month; ?>
                </h1>
                <div class="col-9  ">
                    <a href="?y=<?= $prevYear ?>&m=<?= $prevMonth; ?>" class="btn btn-outline-light ">
                        <?= $prevMonth; ?>月
                    </a>
                    <a href="./index.php" class=" btn btn-lg">
                        今天
                    </a>
                    <a href="?y=<?= $nextYear ?>&m=<?= $nextMonth; ?>" class="btn btn-outline-light ">
                        <?= $nextMonth; ?>月
                    </a>

                </div>
            </nav>

        </div>

        <div class="cal">
            <div class="left btn-group-sm">
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=1'" class="btn btn-outline-secondary">1</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=2'" class="btn btn-outline-secondary">2</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=3'" class="btn btn-outline-secondary">3</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=4'" class="btn btn-outline-secondary">4</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=5'" class="btn btn-outline-secondary">5</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=6'" class="btn btn-outline-secondary">6</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=7'" class="btn btn-outline-secondary">7</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=8'" class="btn btn-outline-secondary">8</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=9'" class="btn btn-outline-secondary">9</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=10'" class="btn btn-outline-secondary">10</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=11'" class="btn btn-outline-secondary">11</button>
                <button type="button" onclick="location.href='?y=<?= $year ?>&m=12'" class="btn btn-outline-secondary">12</button>
            </div>
            <div class="basemap">
                <img src="" alt="">
            </div>
            <div class="day">
                <?php
                $week = array("mon.", "tue.", "wed.", "thu.", "fri.", "sat.", "sun.");
                for ($i = 0; $i < 7; $i++) {
                    echo "<div class='date d-flex flex-row'>";
                    echo $week[$i];
                    echo "<div>&nbsp</div>";
                    echo "</div>";
                }
                foreach ($cal as $i => $day) {
                    if ($day != "") { // !=  不等於
                        $show = explode("-", $day)[2];
                    } else {
                        $show = "";
                    }

                    if (substr($day, -1) == 6 || substr($day, -1) == 7) {

                        echo "<div class='date holiday'";
                        if ($day == $today) {

                            echo "style" . "='background-color: lightcyan'";
                        }
                        echo ">";
                        echo $show;


                        if (array_key_exists(substr($day, -7, -2), $holiday)) {
                            // if (array_key_exists("10-10", $holiday)) {
                            echo "<div>{$holiday[substr($day, -7, -2)]}</div>";
                        } else {
                            echo "<div>&nbsp</div>";
                        }


                        echo "</div>";
                    } else if (substr($day, -1) >= 1 && substr($day, -1) <= 5) {

                        echo "<div class='date";
                        if (array_key_exists(substr($day, -7, -2), $holiday)) {
                            echo " holiday'";
                        } else {
                            echo "'";
                        }
                        if ($day == $today) {
                            echo "style" . "='background-color: lightcyan'";
                        }
                        echo ">";
                        echo $show;

                        if (array_key_exists(substr($day, -7, -2), $holiday)) {
                            echo "<div>{$holiday[substr($day, -7, -2)]}</div>";
                        } else {
                            echo "<div>&nbsp</div>";
                        }


                        echo "</div>";
                    } else {
                        echo "<div class='date' >" . $show . "</div>";
                    }
                }




                ?>
            </div>





        </div>

        <div class="footer">

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>