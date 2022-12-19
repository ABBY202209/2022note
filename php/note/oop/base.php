<?php
//資料表
$Student = new DB('students'); //用單數是因為dom都是一筆資料;慣例非規定
// $Dept=new DB('dept');

// echo $Dept->find(2)->name;//直接用箭頭取代[]

// var_dump($Student);
// $john=$Student->find(30)['name']; //用這個方法很明確是個陣列
// echo is_object($john);
// echo "<pre>";
// print_r($john);
// echo "</pre>";
// echo $john->name;
// echo $john->parents;
// echo "<br>";

//加入find()的方法來取得單一筆資料
// $john=$Student->find(30);//取得第30筆資料
// echo $john['name'];
// echo "<br>";

// $stus = $Student->all(['dept' => 3]); //[]加上條件
// // var_dump($stus);
// foreach ($stus as $stu) {
//     echo $stu['parents'] . "=>" . $stu['dept'];
//     echo "<br>";
// }

//新增資料
/* $Student->save(['name'=>'張大同','dept'=>2,'uni_id'=>"H22211223"]);

echo "<hr>"; */
//更新資料
/* $Student->save(['name'=>'張大同','dept'=>2,'uni_id'=>"H22211223",'id'=>3]);
$stu=$Student->find(15);
dd($stu);
$stu['name']="陳秋桂";
$Student->save($stu); */

//數學函式
/*count
sum
max
min
avg 平均
*/
echo $Student->count(['dept'=>2]);//可以指定
// echo $Student->count('*'); //*非變數，只是代表一個值


class DB
{ //先宣告一個db的類別
    protected $table; //再宣告一些變數
    protected $dsn = "mysql:host=localhost;charser=utf8;dbname=school"; //參數,可寫死也可以不寫死
    protected $pdo;

    //建構式
    public function __construct($table)
    {
        $this->pdo = new PDO($this->dsn, 'root', ''); //pdo dsn 連結資料庫
        $this->table = $table;
    }
    public function all(...$args)
    { //all()內可代參數亦可略

        // // global $pdo;//不再需要global
        $sql = "select * from $this->table ";

        if (isset($args[0])) {
            if (is_array($args[0])) {
                //是陣列 ['acc'=>'mack','pw'=>'1234'];
                //是陣列 ['product'=>'PC','price'=>'10000'];

                foreach ($args[0] as $key => $value) {
                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql . " WHERE " . join(" && ", $tmp);
            } else {
                //是字串
                $sql = $sql . $args[0];
            }
        }

        if (isset($args[1])) {
            $sql = $sql . $args[1];
        }

        echo $sql;
        return $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC); //fetchAll 二維陣列

    }

    function find($id)
    {
        $sql = "select * from `$this->table` ";

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key`='$value'";//將$tmp轉成key $value
            }

            $sql = $sql . " where " . join(" && ", $tmp);
        } else {

            $sql = $sql . " where `id`='$id'";
        }
        //echo $sql;
        $row = $this->pdo
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($row);
        echo "</pre>";
        //1.
        $data = new stdClass; //會產生一個空的物件，可寫入任何東西
        // $date=$this->pdo->query($sql)->fetch(PDO::FETCH_OBJ);//使用fetch取代stdClass和foreach

        //2.
        foreach ($row as $col => $value) {
            # code...
            $data->{$col} = $value; //轉化成物件
        }
        return $data;
    }

    //使用一個function 設一個變數，條件符合時，刪除所有的資料
    function del($id)
    {
        $sql = "select from `$this->table` "; //記得拿掉*

        if (is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " where " . join(" && ", $tmp);
        } else {

            $sql = $sql . " where `id`='$id'";
        }
        echo $sql;
        // return $this->pdo->exec($sql);

    }




    //使用一個function，同時可以新增及修改
    // 兩者的相異處在有無id
    function save($array)
    { //(代入一個陣列)
        if (isset($arry['id'])) { //確認陣列內有無id
            # code...
            //有id 更新update
            foreach ($array as $key => $value) {

                if ($key != 'id') { //解決id重覆的問題
                    # code...
                    $tmp[] = "`key`='$value'";
                }
            }
        } else {
            //沒有id 新增insert
            $cols = array_keys($array);

            $sql = "insert into $this->table (`" . join("`,`", $cols) . "`) 
        values('" . join("','", $array) . "')"; // table（`" .join("`,`",$cols). "`) =>`col1`,`col2`,`col3`

            echo $sql;
            //return $this->pdo->exec($sql);
        }
    }

    function count($arg){
        if (is_array($arg)) {
            # code...
            foreach($arg as $key =>$value){
                $tmp[]="`$key`='$value'";
            }
            $sql = "select count(*) from $this->table where";
            $sql.=join(" && ",$tmp);

        }else{
            $sql="select count($arg) from $this->table";
        }
        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    //sum 須要給2個以上的欄位
    function sum($col,...$arg){//...不定參數
        if (isset($arg[0])) {
            # code...
            foreach($arg as $key =>$value){
                $tmp[]="`$key`='$value'";
            }
            $sql = "select sum($col) from $this->table where";
            $sql.=join(" && ",$tmp);
            
        }else{
            $sql="select sum($col) from $this->table";
        }
        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
