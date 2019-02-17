<?php
session_start();
$_SESSION['a']=123;
echo gettype($_SESSION['a']);
?>