<h1>物件導向</h1>
<a href="./static.php">靜態</a>
<a href="./chaining.php">靜態</a>
<hr>
<?php


//方法的使用
// $cat=new Animal;//Animal是一個類別 $cat是實體
// $dog=new Animal;

// echo $cat->type;//出現結果是animal
// echo "<br>";
// echo $dog->name;//出現結果是john

// echo "<pre>";
// print_r($cat);
// echo "/<pre>";
// echo "<pre>";
// var_dump($cat);
// echo "/<pre>";

/* 權限為public時，可以對成員做修改
$cat->type='snake';
$dog->name='mack';
echo "<br>";
echo $cat->type;
echo "<br>";
echo $dog->name; */

// $cat->run();
// $dog->speed();

//建構式的使用
// $cat=new Animal('小花','黑白相間');
// // echo $cat->name;//無法
// echo $cat->getName();
// echo $cat->getColor();

// $dog =new Animal('小莉','土黃色');
// echo $dog->getName();
// echo $dog->getColor();

// $turtle =new Animal('達文西','墨綠色');
// echo $turtle->getName();
// echo $turtle->getColor();

// $guineapig =new Animal('puipui','黃色');
// echo $guineapig->getName();
// echo $guineapig->getColor();

//繼承使用
//下面的方法跑得出來，但與沒有繼承一樣
$cat=new Cat('小花','黑白');
echo $cat->getType();
echo $cat->getName();
echo $cat->getColor();
$cat->hide();

$dog=new Dog('可可','咖啡');
echo $cat->getType();
echo $cat->getName();
echo $cat->getColor();
$dog->eat();




//物件的抽象化宣告
Class Animal{
    //public 必須加 (公開)
    //protected, private(內部) 不可直接echo
    public $type='animal';//成員;
    public $name='John';
    public $hair_color="brown";

    public function __construct($name,$color){//可在()內加多個參數;順序隨便，但為了可讀性，依序為佳
        //建構式內容
        //construct一開始就執行的東西:$cat=new Animal
        // $this->run();
        $this->name=$name;//將類別裡的name改成$name
        $this->hair_color=$color;

    }

    public function getName()
    {
        return $this->name;
    }
    public function getColor()
    {
        return $this->hair_color;
    }
    public function getType()
    {
        return $this->type;
    }

    public function run(){
        //公開行為內容
        echo "我會跑呀";
        $this->speed();//$this自己所在類別裡的speed()
        echo $this->type;

    }

    private function speed(){
        //私有行為內容
        echo "我會叫唷";
    }

}

//繼承，在建構式中更改成員內容
class Cat extends Animal{
    public function __construct($name,$color)
    {
        //使用parent
        //parent::__construct($name,$color);
        //$this->type='貓';

        //所有的東西一定要包在function內，才能執行
    $this->name=$name;
    $this->hair_color=$color;
    $this->type='貓';
    }
    public function hide(){
        echo "很會跳";
    }
}
class Dog extends Animal{
    public function __construct($name,$color)
    {
      
        //所有的東西一定要包在function內，才能執行
        $this->name=$name;
        $this->hair_color=$color;
        $this->type='狗';
    }
    public function eat(){
        echo "吃很多呀";
    }
}
?>