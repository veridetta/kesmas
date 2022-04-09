<?php
//redirect ke halaman login
//include session_checker.php
include "/include/session_checker.php";
//jika sudah ada session
//redirect ke input
header("location:/admin/input");
?>