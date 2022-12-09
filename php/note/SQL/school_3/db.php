<h1>all()-給定資料表名後，會回傳整個資料表的資料</h1>
<p>多筆</p>

<?php
include_once "./db/base.php"; //將include放外面比較有較效能

$rows = all('students', ['name' => '宋時雨']); //可以一直加條件用,和''隔開
dd($rows);

$row = find('students', 20); //回傳指定id
dd($row);

// update('students',['name'=>'abby']);
update('students', ['name' => 'abby', 'dept' => '4'], ['id' => 19]);

//insert
insert('class_student',['school_num'=>'911799',
                         'class_code'=>'101',
                         'seat_num'=>51,
                         'year'=>2000]);


//delete
// del('students',['dept'=>'4']);
echo del('students',['dept'=>1]);

//
// echo q("SElECT conutn(id) FROM `students` ");
$result=q("SElECT conutn(id) FROM `students` ");
echo $result[0][0];//第0筆資料的第0個位置

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
            foreach ($args[0] as $key => $value) { //用foreach拆字串
                // $tmp=$tmp . "`$key`='$value'&&";
                $tmp[] = "`$key`='$value'"; //變成陣列

            }
            // $tmp = trim($tmp, " && "); //移除

            // $sql = $sql . $tmp;//再串起來
            $sql = $sql . " WHERE " . join(" && ", $tmp); //join(放置的內容,結合到陣列) 
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

function find($table, $id)
{
    global $pdo;
    // $sql="SELECT * FROM `table` WHERE `id`='id'";
    $sql = "SELECT * FROM `$table` ";

    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ", $tmp);
    } else {

        $sql = $sql . " where `id`='$id'";
    }
    echo $sql;
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

//update()-給定資料表的條件後，會去更新相應的資料。
//多筆或單筆

function update($table, $col, ...$args)
{ //不定參數只能放最後面
    global $pdo;

    $sql = "UPDATE $table set ";

    if (is_array($col)) {
        foreach ($col as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql  . join(",", $tmp);
    } else {

        echo "錯誤，請提供以陣列型式的更新資料";
    }

    if (isset($args[0])) {
        if (is_array($args[0])) { //is_array 判斷$args是不是陣列
            //是陣列 ['acc'=>'mack','pw'=>'1234'] 如何變成 where `acc`='mack',`pw`='1234';

            $tmp = []; //清空陣列
            foreach ($args[0] as $key => $value) { //用foreach拆字串
                // $tmp=$tmp . "`$key`='$value'&&";
                $tmp[] = "`$key`='$value'"; //變成陣列

            }
            // $tmp = trim($tmp, " && "); //移除

            // $sql = $sql . $tmp;//再串起來
            $sql = $sql . " WHERE " . join(" && ", $tmp); //join(放置的內容,結合到陣列) 
        } else {
            //是字串，$sql+$args[0]
            $sql = $sql . " WHERE `id`='{$args[0]}'";
        }
    }

    echo "修改結果.$sql<br>";
    return $pdo->exec($sql); //加不加都可以;exec告知哪個欄位被影響了 vs query 回傳結果
}

//insert()-給定資料內容後，會去新增資料到資料表
function insert($table, $cols)
{
    global $pdo;
    $keys=array_keys($cols);
    dd(join(",",$keys));
    $sql = "INSERT INTO  $table() values() ";//陣列和字中可以用{}轉換，但函式不可

    echo $sql. "<br>";
    // return $pdo->exec($sql);
}

//del()-給定條件後，會去刪除指定的資料
//與find很像
function del($table, $id)
{
    global $pdo;
    // $sql="SELECT * FROM `table` WHERE `id`='id'";
    $sql = "DELETE FROM `$table` ";

    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ", $tmp);
    } else {

        $sql = $sql . " where `id`='$id'";
    }
    echo $sql;
    return $pdo->exec($sql);
}

//萬用自訂查詢sql函式
function q($sql){
    global $pdo;


    return $pdo->query($sql)->fetchAll();

}

?>