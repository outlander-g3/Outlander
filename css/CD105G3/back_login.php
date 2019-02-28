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
  <title>山行者後台</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png">
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
    if(isset($_SESSION['reason'])){
      if($_SESSION['reason'] == 'nonexist'){
      echo "<p class='error'>此帳號密碼不存在！</p>";
      }else if($_SESSION['reason'] == 'admPower0'){
      echo "<p class='error'>此帳號已被停權！</p>";
      }
    }
    ?>
    <p><label>帳號 <input type="text" class="inputs" name="admId" placeholder="account" autofocus required></label></p>
    <p><label>密碼 <input type="password" class="inputs" name="admPsw" placeholder="password" required></label></p>
    <input type="submit" class="btn-main-s" value="登入">
  </form>
  </div>
</body>
</html>