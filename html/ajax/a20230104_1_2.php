<?php
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
$data=$_GET;
// dd($data);
// echo json_encode($data);//response 

//宣告變數
$num1 = $data['name'];
$num2 = $data['mobile'];
$result = $num1 + $num2;
//存成array
$myArr = [
    'num1' => $num1,
    'num2' => $num2,
    'result' => $result,
];
//再丟回來
echo json_encode($myArr);


// json_encode() 轉型成jq可讀
// $age=array("a"=>1,"b"=>2,"c"=>3);
// echo $age;
// echo json_encode($age);