<!DOCTYPE html>
<html>
  <head>
  	<title>新增相簿</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
	<script src="js/init.js"></script>
    <script type="text/javascript">
      function DeletePhoto(album_id, photo_id)
      {
        if (confirm("請確認是否刪除此相片？"))
          location.href = "delPhoto.php?album_id=" + album_id + "&photo_id=" + photo_id;
      }
    </script>
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
				<font face="標楷體" font size="20px" font color="white"></font>
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
    <?php 
      require_once("dbtools.inc.php");
      $album_id = $_GET["album_id"]; 
      
      //取得登入者的帳號
	    $login_users = "";
	    session_start();
	    if (isset($_SESSION["login_users"]))
        $login_users = $_SESSION["login_users"];
      
      //建立資料連接
      $link = create_connection();

      //取得相簿的名稱及相簿的主人
      $sql = "SELECT name, owner FROM album WHERE id = $album_id";
      $result = execute_sql($link, "album", $sql);
      $row = mysqli_fetch_object($result);
      $album_name = $row->name;
      $album_owner = $row->owner;
      
      echo "<p align='center'>$album_name</p>";
													
      //取得相簿裡所有照片的縮圖
      $sql = "SELECT id, name, filename FROM photo WHERE album_id = $album_id";
      $result = execute_sql($link, "album", $sql);
	    $total_photo = mysqli_num_rows($result);
	  
      echo "<table border='0' align='center'>";

      //指定每列顯示幾張照片
      $photo_per_row = 5;
      					
      //顯示相片縮圖
      $i = 1;
      while ($row = mysqli_fetch_assoc($result))
      {
      	$photo_id = $row["id"];
      	$photo_name = $row["name"];
      	$file_name = $row["filename"];
      	
        if ($i % $photo_per_row == 1)
          echo "<tr align='center'>";
        
        echo "<td width='160px'><a href='photoDetail.php?album=$album_id&photo=$photo_id'>
              <img src='Thumbnail/$file_name' style='border-color:Black;border-width:1px'>
              <br>$photo_name</a>";
        
        if ($album_owner == $login_users)
          echo "<br><a href='editPhoto.php?photo_id=$photo_id'>編輯</a> 
               <a href='#' onclick='DeletePhoto($album_id, $photo_id)'>刪除</a>";
          
        echo "<p></td>";
        
        if ($i % $photo_per_row == 0 || $i == $total_photo)
          echo "</tr>";
        
        $i++;
      }
      
      echo "</table>" ;
											  		
      //釋放資源並關閉資料連接
      mysqli_free_result($result);
      mysqli_close($link);
      
      echo "<hr><p align='center'>";
      if ($album_owner == $login_users)
        echo "<a href='uploadPhoto.php?album_id=$album_id'>上傳相片</a> ";
    ?>
	<a href='right-sidebar.php'>回曬貓區</a></p>
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