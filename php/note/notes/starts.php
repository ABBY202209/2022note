<h2>使用函式印星星</h2>
<pre>
<?php
echo "<h1>使用變數</h1>";
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


echo "<h1>使用function，可重覆印</h1>";
echo "<p>使用swicth，可印出不同的形狀</p>";

starts();
starts(5);
starts('直角', 9);
starts('矩形', 5);
starts('對角線',39);

function starts($shape='正三角', $size=7){//代參數進去，如果是空陣列會跑參數

//加入判斷式
$array=['正三角','菱形','直角','矩形','對角線'];
if (!in_array($shape,$array)) {
    echo "請輸入正確的形狀(正三角、直角、矩形、對角線)";
    return;
}
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