<h3>靜態</h3>
<?php

//靜態宣告;會佔記憶體，要盡量避免
//適合用在固定不變的物件
//一次只能取一個值
// echo car::$type;//::
// echo car::speed();
// car::$type="BMW";
// echo car::$type;

//改變內容時，前面宣告的不會跟著改變
// $carA=car::$type;
// echo $carA;
// $carA="BMW";
// car::$type="BMW";
// echo car::$type;
// echo $carA;
// car::$type="瑪莎拉蒂";
// $carB=car::$type;
// echo "b:".$carB;


//非靜態宣告;不可在靜態使用
// $car=new car;
// echo $car->type;

echo car::type;
//class 會在記憶體先開一個空間
class Car{
    // public static $type='裕隆';//靜態屬性;也會先開一個空間
    public const type='裕隆';//const 宣告成常數 ;不可更改

    public static function speed(){

        return 60;
    }
}


?>