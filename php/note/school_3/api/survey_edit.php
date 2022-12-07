<?php
include_once "../db/base.php";

dd($_POST['subject']);
dd($_POST['subject_id']);

//早期要先設變數
// $subject=find('survey_subject',$_POST['subject_id']);
// dd($subject);
//再設判斷式，比對資料，有修改就更新
// if($subject['subect']!=$_POST['subject']){
//     //update('survey_subject',['subject'=>$_POST['subject']],$_POST['subject_id']);
    
// }

//現在資料料會自動比對，除非資安性高，可多一跑判斷式確認
update('survey_subject',['subject'=>$_POST['subject']],$_POST['id']);

dd($_POST['opt']);
dd($_POST['opt_id']);

foreach($_POST['opt_id'] as $idx => $id){
    $option=find('survey_options',$id);
    echo "<div>原本的選項 $id 資料 =>".$option['opt']."<br>";
    echo "表單送過來的編輯後的選項 $id 資料 =>".$_POST['opt'][$idx]."</div>";
    update('survey_options',['opt'=>$_POST['opt'][$idx]],$id);
    
}

//編輯時有新增資料時，
if(isset($_POST['optn'])){
    foreach($_POST['optn'] as $option){
        if($option!=''){
            $tmp=['optn'=>$option,
                  'subject_id'=>$subject_id,
                  'vote'=>0];
            dd($tmp);
            insert('survey_options',$tmp);
        } 
    }
}
//回survey
header("location:../admin_center.php?do=survey");
