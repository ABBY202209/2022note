<h1></h1>

<?php
include_once "./db/base.php"; //將include放外面比較有較效能

$rows = all('students',['name'=>'宋時雨']); //可以一直加條件用,和''隔開
dd($rows);

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
/**
 * pram table - 資料表名稱
 * pram args[0] - where 條件(array)或sql字串
 * pram args[1] - order by limit 之類的sql字串
 */

function all($table, ...$args)
{
    global $pdo; //連接include
    $sql = "SELECT * FROM $table";

    if (isset($args[0])) { //將$args代入
        if (is_array($args[0])) { //is_array 判斷$args是不是陣列
            //是陣列 ['acc'=>'mack','pw'=>'1234'] 如何變成 where `acc`='mack',`pw`='1234';

            // $tmp = '';
            foreach ($args[0] as $key => $value) {
                // $tmp=$tmp . "`$key`='$value'&&";
                $tmp[]="`$key`='$value'"; //變成字串

            }
            // $tmp = trim($tmp, " && "); //前後空白時移除

            // $sql = $sql . $tmp;
            $sql=$sql ." WHERE ". join(" && " ,$tmp);//join(放置的內容,結合到哪個字串)
        } else {
            //是字串，$sql+$args[0]
            $sql = $sql . $args[0];
        }
    }
    echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
