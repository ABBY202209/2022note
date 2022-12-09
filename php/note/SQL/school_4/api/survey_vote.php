<?php
include_once "../db/base.php";

$option_id=$_POST['option'];
$option=find('survey_option',$option_id);
$subject=find("survey_subject",$option['subject_id']);

$subject['vote']++;//=$subject['vote]=$subject['vote']+1;
$option['vote']++;
echo "<bt>++後";
// dd($option);
dd($subject);
update("survey_subject",['vote'=>$subject['vote']],$subject['id']);
echo "<hr>";
update("survey_subject",$subject,$subject['id']);
update("survey_options",$option,$option['id']);


?>