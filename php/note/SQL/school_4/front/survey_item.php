<?php
if (isset($_GET['id'])) {
    $survey = find("survey_subject", $_GET['id']); //取得主題資料
    $options = all("survey_options", ['subject_id' => $_GET['id']]); //subject_id是$_GET['id']
    // dd($survey);
    // dd($options);
} else {
    $error = "請選正確選項";
}
?>
<h3 class="text-center font-weight-bold"><?= $survey['subject']; //代出主題
                                            ?></h3>


<form action="./api/survey_vote.php">
    <div class="col-8 mx-auto mt-4">

        <?php
        if (isset($error)) {
            # code...
            echo "<span style='color:red'>" . $error . "</span>";
        } else {
            foreach ($options as $option) {

        ?>
                <!-- 列表項目 -->
                <div class="input-group" style="margin-top:-1px">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" name="option" value="<?=$option['id'];?>">
                            <input type="hidden" name="optId[]" value="<?=$option['id'];?>">
                        </div>
                    </div>
                    <div class="form-control">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                </div>
                <div class="input-group" style="margin-top:-1px">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="radio" name="option">
                        </div>
                    </div>
                    <div class="form-control">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                </div>
    </div>
<?php
            }
        }

?>
<?php
if (!isset($error)) {
    # code...
?>
    <!-- 按扭 -->
    <div class="text-center mt-4">
        <input type="submit" class="btn btn-primary mx-1" value="投票">
        <input type="hidden" name="subject_id" value="<?=$survey['id'];?>">
        <a href="index.php?do=survey" class="btn btn-warning mx-1">取消返回</a>
    </div>
<?php
}
?>

</form>