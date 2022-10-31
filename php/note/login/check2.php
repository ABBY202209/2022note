<?php
session_start();

$users=[
    [
        "name"=>"abby",
        "pw"=>"1234",
        "level"=>"admin",
    ],
    [
        "name"=>"snoopy",
        "pw"=>"1234",
        "level"=>"user",
    ],
    [
        "name"=>"charlie"
        "pw"=>"1234",
        "level"=>"vip",
    ]
    ];

$formAcc=$_POST['acc'];
$formPw=$_POST['pw'];

$chk=false;

foreach($users as $user){
    if ($user['name']==$formAcc && $user['pw']==$formPw) {
        $chk=true;
    }
}
// if($acc==$formAcc && $pw==$formPw){
if($chk){
    $_SESSION['login']=$formAcc;
    //自動重載
    $times=$_COOKIE['times']+1;
    setcookie('times',$times,time()+(60*60*24*365));
}else{
    $error="帳號或密碼錯誤";
}

if (isset($error)) {
    header("location:login2.php")
}

header("location:login2.php");

?>