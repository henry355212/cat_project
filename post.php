<?php
  require_once("dbtools.inc.php");
	
  //$author = $_POST["author"];
  $name = $_POST["name"];
  $subject = $_POST["subject"]; 
  $content = $_POST["content"]; 
  $current_time = date("Y-m-d H:i:s");

  //建立資料連接
  $link = create_connection();
			
  //執行SQL查詢
 // $sql = "INSERT INTO message(author, subject, content, date)
  $sql = "INSERT INTO message(name, subject, content, date)
          VALUES ('$name', '$subject', '$content', '$current_time')";
  $result = execute_sql($link, "album", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:forum.php");
  exit();
?>