
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
    <?php
//使用PDO方式建立資料庫連線物件
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

if(isset($_GET['code'])){
    $sql="SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                 `students`.`name` as '姓名',
                 `students`.`birthday` as '生日',
                 `students`.`graduate_at` as '畢業國中'
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
    $sql_total="SELECT count(`students`.`id`)
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
}else{
    //建立撈取學生資料的語法，限制只撈取前20筆
    $sql="SELECT `students`.`id`,
                 `students`.`school_num` as '學號',
                 `students`.`name` as '姓名',
                 `students`.`birthday` as '生日',
                 `students`.`graduate_at` as '畢業國中'
          FROM `students`";
    $sql_total="SELECT count(`students`.`id`)
          FROM `students`";
}
/**
 * 分頁參數處理中心
 */

 $div=10;
 $total=$pdo->query($sql_total)->fetchColumn();
//  echo "總筆數為:".$total;
 $pages=ceil($total/$div);
//  echo "總頁數為:".$pages;
 //$now=(isset($_GET['page']))?$_GET['page']:1;
 $now=$_GET['page']??1;
//  echo "當前頁為:". $now;
 $start=($now-1)*$div;

$sql=$sql. " LIMIT $start,$div";
//執行SQL語法，並從資料庫取回全部符合的資料，加上PDO::FETCH_ASSOC表示只需回傳帶有欄位名的資料
$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
</head>
<body>
    
<!-- <pre>
   <?php //print_r($rows);?> ;
</pre> -->
<h1>學生管理系統</h1>
<nav>
    
    <a href="reg.php">教師註冊</a>
    <a href="login.php">教師登入</a>

</nav>
<nav>
<ul class="class-list">
<?php
    //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
    $sql="SELECT `id`,`code`,`name` FROM `classes`";
    $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach($classes as $class){
        echo "<li><a href='?code={$class['code']}'>{$class['name']}</a></li>";
    }
?>  
</ul>
</nav>
<!--根據status來顯示回應-->
<?php
if(isset($_GET['status'])){
    switch($_GET['status']){
        case 'add_success':
            echo "<span style='color:green'>新增學生成功</span>";
        break;
        case 'add_fail';
            echo "<span style='color:red'>新增學生有誤</span>";
        break;
        case 'edit_error':
            echo "<span style='color:red'>無法編輯，請洽管理員，或正確操作</span>";
        break;
    }
}

?>
<div class="pages">
    <?php
    //上一頁
    //當前頁碼-1,可是不能小於0,最小是1,如果是0,不顯示
    if(($now-1)>=1){
        $prev=$now-1;
        if(isset($_GET['code'])){
            echo "<a href='?page=$prev&code={$_GET['code']}'> ";
            echo "&lt; ";
            echo " </a>";
            
        }else{
   
            echo "<a href='?page=$prev'> ";
            echo "&lt; ";
            echo " </a>";
        }
    }else{
        echo "<a class='noshow'>&nbsp;</a>";
    }

    ?>
    <?php
    //第一頁
    if ($now>=4) {
        if (isset($_GET['code'])) {
            echo "<a href='?page=1&code={$_GET['code']}'>";
            echo "1";
            echo "</a>...";
        }else{
            echo "<a href='?page=1'>";
            echo "1";
            echo "</a>...";
        }
    }
    ?>
    <?php 
    //頁碼區
    //只顯示前後四頁，從now-2開始，到now+2
    // 
    if ($now>=3 && $now<=($pages-2)) { //
        $startpage=$now-2;
    }else if($now-2<3){
        $startpage=1;
    }else{
        $startpage=$pages-4;
    }
    for($i=$startpage;$i<=($startpage+4);$i++){
        $nowPage=($i==$now)?'now':'';
        if(isset($_GET['code'])){
            echo "<a href='?page=$i&code={$_GET['code']}' class='$nowPage'> ";
            echo $i;
            echo " </a>";
            
        }else{
            
            echo "<a href='?page=$i' class='$nowPage'> ";
            echo $i;
            echo " </a>";
        }
    }
    ?>
    <?php
        //顯示最後一頁
        if($now<=($pages-3)){
            if(isset($_GET['code'])){
                echo "...<a href='?page=$pages&code={$_GET['code']}'> ";
                echo "$pages";
                echo " </a>";
                
            }else{
       
                echo "...<a href='?page=$pages'> ";
                echo "$pages";
                echo " </a>";
            }
        }else{
            echo "<a class='noshow'>&nbsp;</a>";
        }
    ?> 
    <?php
    //下一頁
    //當前頁碼+1,可是不能超過總頁數,最大是總頁數,如果超過總頁數,不顯示
    if(($now+1)<=$pages){
        $next=$now+1;
        if(isset($_GET['code'])){
            echo "<a href='?page=$next&code={$_GET['code']}'> ";
            //echo "< ";
            echo "&gt; ";
            echo " </a>";
        }else{
            echo "<a href='?page=$next'> ";
            //echo " >";
            echo "&gt; ";
            echo " </a>";
        }
    }

    ?>  
     
</div>
<!--建立顯示學生列表的表格html語法-->
<table class='list-students'>
<tr>
    <td>學號</td>
    <td>姓名</td>
    <td>生日</td>
    <td>畢業國中</td>
    <td>年齡</td>
    
</tr>    
<?php
//使用迴圈來顯示每一位學生的資料
foreach($rows as $row){ 
    $age=round((strtotime('now')-strtotime($row['生日']))/(60*60*24*365),1);
    
 echo "<tr>";
 echo "<td>{$row['學號']}</td>";
 echo "<td>{$row['姓名']}</td>";
 echo "<td>{$row['生日']}</td>";
 echo "<td>{$row['畢業國中']}</td>";
 echo "<td>{$age}</td>";

}
?>
</table>

</body>
</html>