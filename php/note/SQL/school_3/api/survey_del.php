<?php
include_once "../db/base.php";

//調查主題的id
$id=$_GET['id'];
//關聯選項的id
$options=all("survey_options",['subject_id'=>$id]);
//del
del("survey_subject",$id);
del("survey_options",['subject_id'=>$id]);


header("location:../admin_center.php?do=survey");

?>