<?php

$Student=new DB('students');//用單數是因為dom都是一筆資料;慣例非規定
// var_dump($Student);

//加入find()的方法來取得單一筆資料
$john=$Student->find(30);//取得第30筆資料
echo $john['name'];

$stus=$Student->all(['dept'=>3]);//[]加上條件
// var_dump($stus);
foreach($stus as $stu){
    echo $stu['parents']."=>".$stu['dept'];
    echo "<br>";
}

class DB{//先宣告一個db的類別
    protected $table;//再宣告一些變數
    protected $dsn="mysql:host=localhost;charser=utf8;dbname=school";//參數,可寫死也可以不寫死
    protected $pdo;

    //建構式
    public function __construct($table)
    {
        $this->pdo=new PDO($this->dsn,'root','');//pdo dsn 連結資料庫
        $this->table=$table;
        
    }
    public function all(...$args){//all()內可代參數亦可略
// global $pdo;//不再需要global
$sql="select * from $this->table ";

if(isset($args[0])){
    if(is_array($args[0])){
        //是陣列 ['acc'=>'mack','pw'=>'1234'];
        //是陣列 ['product'=>'PC','price'=>'10000'];

        foreach($args[0] as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql=$sql ." WHERE ". join(" && " ,$tmp);
    }else{
        //是字串
        $sql=$sql . $args[0];
    }
}

if(isset($args[1])){
    $sql = $sql . $args[1];
}

// echo $sql;
    $row=$this->pdo
              ->query($sql)
              ->fetchAll(PDO::FETCH_ASSOC);
    $data=new stdClass;
    foreach ($row as $col => $value) {
        # code...
        $date->{$col}=$value;
    }
return $date ;
// return $this->pdo
//             ->query($sql)
//             ->fetchAll(PDO::FETCH_ASSOC);//fetchAll 二維陣列

    }
    function find($id){
        $sql="select *from `$this->table`";
    }
}

?>