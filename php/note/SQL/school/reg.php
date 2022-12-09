<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教師註冊</title>
</head>
<body>
  <h1>教師註冊</h1>  
  <form action="./api/reg_user.php" method="post">
    <!-- form>post>div*5>label>input:text -->
    
      <div><label for="">帳號：<input type="text" name="acc" id=""></label></div>
      <div><label for="">密碼：<input type="password" name="pw" id=""></label></div>
      <div><label for="">信箱：<input type="text" name="email" id=""></label></div>
      <div><label for="">姓名：<input type="text" name="name" id=""></label></div>
      <div>
        <label for=""><input type="submit" name="submit" id="" value="註冊"></label>
        <label for=""><input type="reset" name="reset" id="" value="重置"></label>
      </div>
    </post>
  </form>
</body>
</html>