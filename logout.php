<?php
  //清除 cookie 內容
  setcookie("id", "");
  setcookie("passed", "");
  session_start();
  session_unset();	
  //將使用者導回主網頁
  header("location:index.html");
  exit();
?>