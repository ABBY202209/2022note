<h1>all()-給定資料表名後，會回傳整個資料表的資料</h1>
<p>多筆</p>

<?php
include_once "./db/base.php"; //將include放外面比較有較效能

$rows = all('students',['name'=>'宋時雨']); //可以一直加條件用,和''隔開
dd($rows);

$row = find('students',20); //回傳指定id
dd($row);

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
            foreach ($args[0] as $key => $value) {//用foreach拆字串
                // $tmp=$tmp . "`$key`='$value'&&";
                $tmp[]="`$key`='$value'"; //變成陣列

            }
            // $tmp = trim($tmp, " && "); //移除

            // $sql = $sql . $tmp;//再串起來
            $sql=$sql ." WHERE ". join(" && " ,$tmp);//join(放置的內容,結合到陣列) 
        } else {
            //是字串，$sql+$args[0]
            $sql = $sql . $args[0];
        }
    }
    echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


//傳回指定id的資料
//SELECT * FROM `table` WHERE `id`='id'

function find($table,$id){
    global $pdo; 
    // $sql="SELECT * FROM `table` WHERE `id`='id'";
    $sql="SELECT * FROM `$table` ";

    if (is_array($id)) {
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='$id'";
    }
    echo $sql;
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

}

?>

