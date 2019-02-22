  <section class="container">
    <div class="row">
      <div class="col-5">
        <div class="logo">
          <div class="row">
            <div class="col-6 logoImg">
              <img src="img/logo.png" alt="logo">
            </div>
            <div class="col-18">
              <h1>OUTLANDER</h1>
              <h2>後台管理系統</h2>
            </div>
          </div>
        </div>
        <div class="admin">
          <div class="row">
            <div class="col-6" id="adminImg">
              <img src="img/admin/<?php echo $_SESSION['admImg']?>" alt="<?php echo $_SESSION['admName']?>">
            </div>
            <div class="col-18">
              <p id="admin"><?php echo $_SESSION['admName']?></p>
            </div>
          </div>
        </div>
        <ul id="menu">
          <li id="menu__itinerary"><a href="javascript:;">行程管理 <i class="material-icons">keyboard_arrow_down</i></a></li>
            <ul class="submenu" id="submenu__itinerary">
              <li><a href="back_pdk.php">行程種類管理</a></li>
              <li><a href="back_product.php">行程開團資訊管理</a></li>
              <li><a href="back_order.php">訂單管理</a></li>
              <li><a href="back_equip.php">裝備管理</a></li>
              <li><a href="back_guide.php">嚮導管理</a></li>
              <li><a href="back_tag.php">標籤管理</a></li>
            </ul>
          <li><a href="back_journal.php">登山日誌管理</a></li>
          <li><a href="back_tech.php">登山技巧管理</a></li>
          <li><a href="back_robot.php">客服機器人管理</a></li>
          <li><a href="back_member.php">會員系統管理</a></li>
          <li><a href="back_admin.php">後台系統管理</a></li>
        </ul>
        <a href="back_logout.php" id="signOut">登出</a>
      </div>
      <div class="col-19">
        <div class="main">