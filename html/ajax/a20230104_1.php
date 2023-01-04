<?php
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
$data=$_GET;
// dd($data);
echo json_encode($data);//response 


// json_encode() 轉型成jq可讀
// $age=array("a"=>1,"b"=>2,"c"=>3);
// echo $age;
// echo json_encode($age);