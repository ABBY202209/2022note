<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
$data = $_GET;
// dd($data);
// echo json_encode($data);//response 

//宣告變數
$num1 = $data['name'];
$num2 = $data['mobile'];
$option = $data['option'];
$result = 0;
switch ($option) {
    case '+':
        # code...
        $result = $num1 + $num2;
        break;
    case '-':
        # code...
        $result = $num1 - $num2;
        break;
    case '*':
        # code...
        $result = $num1 * $num2;
        break;
    case '/':
        # code...
        $result = $num1 / $num2;
        break;

    default:
        # code...
        $result = "option 請輸入+ - * /";
        break;
}
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