<?php
  require_once("dbtools.inc.php");
  
  //建立資料連接
  $link = create_connection();
	  
  if (!isset($_POST["album_id"]))
  {
    $album_id = $_GET["album_id"];
	           
    //取得相簿名稱及相簿的主人
    $sql = "SELECT name, owner FROM album WHERE id = $album_id";
    $result = execute_sql($link, "album", $sql);
    $row = mysqli_fetch_object($result);
    $album_name = $row->name;
    $album_owner = $row->owner;
	  
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
  }
  else
  {
  	$album_id = $_POST["album_id"];
  	$album_owner = $_POST["album_owner"];
  	
    //取得登入者帳號
  	session_start();
    $login_users = $_SESSION["login_users"];

    if (isset($login_users) && $album_owner == $login_users)	
    {  	
      for ($i = 0; $i <= 3; $i++)
      {		
        //若檔案名稱不是空字串，表示上傳成功，將暫存檔案移至指定之目錄
        if ($_FILES["myfile"]["name"][$i] != "")
        {
          $src_file = $_FILES["myfile"]["tmp_name"][$i];
          $src_file_name = $_FILES["myfile"]["name"][$i];
          $src_ext = strtolower(strrchr($_FILES["myfile"]["name"][$i], "."));
          $desc_file_name = uniqid() . ".jpg";
	
          $photo_file_name = "./Photo/$desc_file_name";
          $thumbnail_file_name = "./Thumbnail/$desc_file_name";
	
          resize_photo($src_file, $src_ext, $photo_file_name, 600);
          resize_photo($src_file, $src_ext, $thumbnail_file_name, 150);
	        
          $sql = "insert into photo(name, filename, album_id) values('$src_file_name', '$desc_file_name', $album_id)";
          execute_sql($link, "album", $sql);
        }
      }
    }

    //關閉資料連接	
    mysqli_close($link);
  
    header("location:showAlbum.php?album_id=$album_id");
  }
  
  function resize_photo($src_file, $src_ext, $dest_name, $max_size)
  {
  	switch ($src_ext)
  	{
  	  case ".jpg":
  	    $src = imagecreatefromjpeg($src_file);
  	    break;
  	  case ".png":
  	    $src = imagecreatefrompng($src_file);
  	    break;
  	  case ".gif":
  	    $src = imagecreatefromgif($src_file);
  	    break;
  	}

    $src_w = imagesx($src);
    $src_h = imagesy($src);
	  
    //建立新的空圖片
    if($src_w > $src_h)
    {
      $thumb_w = $max_size;
      $thumb_h = intval($src_h / $src_w * $thumb_w);
    }
    else
    {
      $thumb_h = $max_size;
      $thumb_w = intval($src_w / $src_h * $thumb_h);
    }
	  
    $thumb = imagecreatetruecolor($thumb_w, $thumb_h);
	
    //進行複製並縮圖
    imagecopyresized($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
	   
    //儲存相片
    imagejpeg($thumb, $dest_name, 100);

    //釋放影像佔用的記憶體
    imagedestroy($src);
    imagedestroy($thumb); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>電子相簿</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
  <script src="js/init.js"></script>
  <noscript>
		<link rel="stylesheet" href="css/skel-noscript.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-desktop.css" />
	</noscript>
  </head>
  <body>
    <!-- Header -->
	<div id="header">
		<div id="nav-wrapper">
			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li><a href="index.html">主頁</a></li>
						<li><a href="left-sidebar.html">品種介紹</a></li>
						<li class="active"><a href="right-sidebar.php">曬貓區</a></li>
						<li><a href="forum.php">貓奴討論區</a></li>
						<li><a href="no-sidebar.html">會員登入</a></li>
						<li><a href="related-websites.html">相關網站</a></li>
				</ul>
			</nav>
		</div>
		<div class="container">

			<!-- Logo -->
			<div id="logo">
				<font face="標楷體" font size="20px" font color="white">會員管理系統</font>
			</div>
		</div>
	</div>
	<!-- Header -->

	<!-- Main -->
	<div id="main">
		<div id="content" class="container">
			<section>
				<header>
    <div align="center">
        <p align="center">
      <?php echo $album_name ?>
        <form method="post" action="uploadPhoto.php" enctype="multipart/form-data">
          <input type="file" name="myfile[]" size="50"><br>
	      <input type="file" name="myfile[]" size="50"><br>
	      <input type="file" name="myfile[]" size="50"><br>
	      <input type="file" name="myfile[]" size="50"><br><br>
	      <input type="hidden" name="album_id" value="<?php echo $album_id ?>">
	      <input type="hidden" name="album_owner" value="<?php echo $album_owner ?>">
	      <input type="submit" value="上傳">
	      <input type="reset" value="重新設定">
	    </form>
      <a href="showAlbum.php?album_id=<?php echo $album_id ?>">
        回【<?php echo $album_name ?>】相簿</a>
    </p>
</div>
    </header>


			</section>
		</div>
	</div>
	<!-- /Main -->

	<!-- Tweet -->
	<div id="tweet">
		<div class="container">
			<section>
                <blockquote>&ldquo;支持領養，決不棄養&rdquo;</blockquote>
                <blockquote>&ldquo;ADOPT , DON'T ABANDON&rdquo;</blockquote>
			</section>
		</div>
	</div>
	<!-- /Tweet -->

	<!-- Footer -->
	<div id="footer">
		<div class="container">
			<section>
				<header>
					<h2>聯絡我們</h2>					
				</header>
				<ul class="contact">
					<a href ="mailto:toms-no-reply@iii.org.tw"><img src="images/email.png" width="100px" height="100px"></a>			
				</ul>
				<a href ="mailto:toms-no-reply@iii.org.tw"><font color="white" size="5px"><u>toms-no-reply@iii.org.tw</font></u></a>
					
				</ul>
			</section>
		</div>
	</div>
	<!-- /Footer -->

	<!-- Copyright -->
	<div id="copyright">
		<div class="container">
			Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a
				href="http://unsplash.com/cc0">CC0</a>)
		</div>
	</div>
  </body>
</html>