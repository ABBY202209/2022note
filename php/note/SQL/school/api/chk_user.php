<?php
$DSN = "mysql:host=localhost;charset=utf8;dbname=school";
$PDO = new PDO($DSN, 'root', '');

session_start();//用session要加上session_start 

$acc = $_POST['acc'];
$pw = $_POST['pw'];

$SQL = "select count(`id`) from `users` where `acc`='$acc'&&`pw`='$pw'";
$chk = $PDO->query($SQL)->fetchColumn();

if ($chk == 1) {
    $SQL = "select `id`,`acc`,`name`,`last_login` from `users` where `acc`=";
    $user = $PDO->query($SQL)->fetch(PDO::FETCH_ASSOC);

    // $_SESSION['login']=['success'=>1,'acc'=$acc];//把login(變數)設一個陣列
    $_SESSION['login'] = $user;

} else {
    if (isset($_SESSION['login_try'])) {
        $_SESSION['login_try']++;
    }else{
        $_SESSION['login_try']=1;

    }
    header("location:../login.php?error=login");
}
