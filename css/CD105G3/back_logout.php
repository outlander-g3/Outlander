<?php
    session_start();
    session_destroy();
    header("location:back_login.php");
?>