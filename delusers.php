<?php
  require_once("dbtools.inc.php");
  
  $userss_id = $_GET["userss_id"];
  
  //取得登入者帳號
  session_start();
  $login_users = $_SESSION["login_users"];
  
  //建立資料連接
  $link = create_connection();
  
  //刪除儲存在硬碟的相片
  $sql = "SELECT filename FROM photo WHERE userss_id = $userss_id
          AND EXISTS(SELECT '*' FROM userss WHERE id = $userss_id AND owner = '$login_users')";
  $result = execute_sql($link, "userss", $sql);
  
  while ($row = mysqli_fetch_assoc($result))
  {
    $file_name = $row["filename"];
    $photo_path = realpath("./Photo/$file_name");
    $thumbnail_path = realpath("./Thumbnail/$file_name");

    if (file_exists($photo_path))
      unlink($photo_path);

    if (file_exists($thumbnail_path))
      unlink($thumbnail_path);
  }
  
  //刪除儲存在資料庫的相片資訊
  $sql = "DELETE FROM photo WHERE account = $userss_id
          AND EXISTS(SELECT '*' FROM userss WHERE id = $userss_id AND owner = '$login_users')";
  execute_sql($link, "userss", $sql);

  //刪除儲存在資料庫的相簿資訊 	
  $sql = "DELETE FROM userss WHERE id = $userss_id AND owner = '$login_users'";
  execute_sql($link, "userss", $sql);
  	
  //釋放記憶體並關閉資料連接
  mysqli_free_result($result);
  mysqli_close($link);

  header("location:index.php");
?>