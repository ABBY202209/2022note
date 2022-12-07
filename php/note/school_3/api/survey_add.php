<?php
include_once "../db/base.php";

// $subject=$_post['subject'];
// $type=1;//預設單選值：1
// $vote=0;
// $active=0;//先不啟用

//v設一個變數
$subject=[
    'subject'=>$_POST['subject'],
    'type'=>1,
    'vote'=>0,
    'active'=>0
];

//用dd function
dd($_POST['subject']);
// $_POST['opt'][] /*所輸入的資料*/


//使用insert函式，寫入資料
// insert('survey_subject',['subject'=>$subject,
//                          'type'=>$type,
//                          'vote'=>$vote,
//                          'active'=>$actieve]);
insert('survey_subject',$subject);

$subject_id=find('survey_subject',['subject'=>$_POST['subject']])['id'];
//判斷送入資料
if (isset($_POST['opt'])) {
    foreach ($_POST['opt'] as $option) {
        if (option!='') {
            $tmp=[
                'opt'=>$option,
                'subject_id'=>$subject_id,
                'vot'=>0
            ];
            dd($tmp);
            insert('survey_options',$tmp);
        }
        // $tmp=['option'=>$option,
        //       'subject_id'=>???,
        //       'vote'=>0];
        //       insert('survey_options',$tmp);
    }
}



?>