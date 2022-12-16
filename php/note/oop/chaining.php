<?php
$car=new car("yellow");//作出來
echo $car->addColor('sky')
         ->addColor('blue')
         ->addColor('red')
         ->getColor();
echo "<br>";
// echo $car->addColor('blue');

class car{//設計圖
    protected $color;

    public function __construct($color)
    {
        $this->color=$color;
    }
    function getColor(){
        return $this->color;//字串內不可用addColor
        // return $this;//this 自己($car)
    }
    function addColor($color){
        $this->color=$this->color."+".$color;
        //=$this->color.="+".$color;
        // return $this->color."+".$color;
        return $this;
    }
}
?>