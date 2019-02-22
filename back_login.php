<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/back_login.css">
  <title>Document</title>
</head>
<body>
  <div id="st">
  <div class="logo">
    <img src="img/logo.png" alt="logo">
  </div>
  <div class="container">
    <form action="back_login_checkId.php" method="POST">
    <h2>後端管理系統</h2>
    <?php
    if(isset($_SESSION['backwhere'])){
      echo "<p class='error'>此帳號密碼不存在！</p>";
    }
    ?>
    <p><label>帳號 <input type="text" class="inputs" name="admId" placeholder="account"></label></p>
    <p><label>密碼 <input type="password" class="inputs" name="admPsw" placeholder="password"></label></p>
    <input type="submit" class="btn-main-s" value="登入">
  </form>
  </div>
</body>
</html>