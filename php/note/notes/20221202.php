自訂函式
<?php
//只是執行不會印出來
all('students');

//執行all這個變數並印出來
echo "<pre>";
print_r(all('students'));
echo "</pre>";

//外部$array 和function內的$array沒有關係，如同大小名，取不一樣也可以
$array=[1,2,3];
//執行dd的當下，馬上把陣列印出來
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";

}

function all($table){
    $sql="SELECT * FROM `$table`";
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,'root','');

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

$rows=all('students');//宣告變數，不一定要,可直接寫foreach
// foreach ($rows('students') as $row) { //在function內宣告
foreach ($rows as $row) {//執行
    echo $row['name'];//並印出name
}

$rows=all('students');
print_r(array_pop($rows));//$rows會被代入，這時function內外的變數有關聯
print_r($rows);

ddd();//=$args[]
ddd(1,2);//=$args[1,2]
ddd();
ddd();

function ddd(...$args){//不定參數...$args
    echo "<pre>";
    print_r($args);
    echo "</pre>";

}