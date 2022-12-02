<h2>使用函式印星星</h2>
<pre>
    <?php

    $size = 20;//設一個變數
    for ($i = 1; $i <= $size; $i++) {

        for ($k = 1; $k <= ($size - $i); $k++) {
            echo "&nbsp;";
        }

        for ($j = 1; $j <= (2 * $i - 1); $j++) {
            echo "*";
        }
        echo "<br>";
    }

    //使用function，可重覆印
    starts(10);
    starts(5);
    starts(9);
    starts(12);
    starts(39);

    function starts($size)
    {
        for ($i = 1; $i <= $size; $i++) {

            for ($k = 1; $k <= ($size - $i); $k++) {
                echo "&nbsp;";
            }

            for ($j = 1; $j <= (2 * $i - 1); $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }


    ?>
</pre>