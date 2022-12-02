<h2>使用函式印星星</h2>
<pre>
<?php

$size = 20; //設一個變數
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
starts('正三角', 10);
starts('菱形', 5);
starts('直角', 9);
starts('矩形', 5);
starts('對角線',39);

function starts($shape, $size)
{
    switch ($shape) {
        case '正三角':
            for ($i = 1; $i <= $size; $i++) {

                for ($k = 1; $k <= ($size - $i); $k++) {
                    echo "&nbsp;";
                }

                for ($j = 1; $j <= (2 * $i - 1); $j++) {
                    echo "*";
                }
                echo "<br>";
            }
            break;

        case '菱形':
            # code...
            for($i=1;$i<=$size;$i++){
   
                for($k=5-$i;$k>0;$k--){
                    echo "&nbsp;";
                }
            
                for($j=1;$j<=($i*2-1);$j++){
                    echo "*";
                }
            
                echo "<br>";
            }
            for($i=1;$i<=4;$i++){
               
                for($k=1;$k<=$i;$k++){
                    echo "&nbsp;";
                }
            
                for($j=1;$j<=((5-$i)*2-1);$j++){
                    echo "*";
                }
            
                echo "<br>";
            }
            break;

        case '直角':
            for($i=1;$i<=$size;$i++){
                for($j=1;$j<=$i;$j++){
                    echo "*";
                }
                echo "<br>";
            }
            break;

        case '矩形':
            for ($i = 0; $i < $size; $i++) {

                for ($j = 0; $j < $size; $j++) {
                    if ($i == 0 || $i == ($size-1) || $j == 0 || $j == ($size-1)) {
                        echo "*";
                    } else {
                        echo "&nbsp;";
                    }
                }
        
                echo "<br>";
            }
            
            break;
        case '對角線':
            for ($i = 0; $i < $size; $i++) {

                for ($j = 0; $j < $size; $j++) {
                    if ($i == 0 || $i == ($size-1) || $j == 0 || $j == ($size-1) || $i==$j || $i==($size-1)-$j) {
                        echo "*";
                    } else {
                        echo "&nbsp;";
                    }
                }
        
                echo "<br>";
            }
            
            break;

        default:
            # code...
            break;
    }
}


?>
</pre>