<!DOCTYPE html>
<html>
  <head>
    <title>曬貓區</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
	<script src="js/init.js"></script>
    <script type="text/javascript">
      function DeleteAlbum(album_id)
      {
        if (confirm("請確認是否刪除此相簿？"))
          location.href = "delAlbum.php?album_id=" + album_id;
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
			<div>
			<font face="標楷體" font size="20px" font color="white">Meet My Kitty</font>
				
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
      
      //取得登入者帳號及名稱
      session_start();
	  if (isset($_SESSION["login_users"]))
	  {
        $login_users = $_SESSION["login_users"];
        $login_name = $_SESSION["login_name"];
	  }
					
      //建立資料連接
      $link = create_connection();
														
      //取得所有相簿的資料
      $sql = "SELECT id, name, owner FROM album order by name";
      $album_result = execute_sql($link, "album", $sql);
      
      //取得相簿的數目
      $total_album = mysqli_num_rows($album_result);
	  
	  
      
      echo "<table border='0' align='center'>";

      //指定每列顯示幾個相簿
      $album_per_row = 5;
      					
      //顯示相簿清單
      $i = 1;
      while ($row = mysqli_fetch_assoc($album_result))
      {
      	//取得相簿編號、名稱及相簿的主人
      	$album_id = $row["id"];
      	$album_name = $row["name"];
      	$album_owner = $row["owner"];
      	
      	$sql = "SELECT filename FROM photo WHERE album_id = $album_id";
      	$photo_result = execute_sql($link, "album", $sql);
      	
      	//取得相簿的相片數目
      	$total_photo = mysqli_num_rows($photo_result);
      	
      	//相片數目大於 0 就以第一張相片當作相簿封面，否則以 None.png 當封面
      	if ($total_photo > 0)
          $cover_photo = mysqli_fetch_object($photo_result)->filename;
      	else
      	  $cover_photo = "None.png";
      	
      	//釋放記憶體  
      	mysqli_free_result($photo_result);
      	
        if ($i % $album_per_row == 1)
          echo "<tr align='center' valign='top'>";
          
        echo "<td width='160px'>
              <a href='showAlbum.php?album_id=$album_id'>
              <img src='Thumbnail/$cover_photo' style='border-color:Black;border-width:1px'>
              <br>$album_name</a><br>$total_photo Pictures";
        
        if (isset($login_users) && $album_owner == $login_users)
        {
          echo "<br><a href='editAlbum.php?album_id=$album_id'>編輯</a> 
                <a href='#' onclick='DeleteAlbum($album_id)'>刪除</a>";
        }
        
        echo "<p></td>";
        
        if ($i % $album_per_row == 0 || $i == $total_album)
          echo "</tr>";
               
        $i++;
      }
      
      echo "</table>" ;
											  		
      //釋放記憶體並關閉資料連接
      mysqli_free_result($album_result);
      mysqli_close($link);
      
      echo "<hr><p align='center'>";
      
      //若 isset($login_name) 傳回 false，表示使用者尚未登入系統
      if (!isset($login_name))
        echo "<a href='logon.php'>會員登入</a>";
      else
      {
        echo "<a href='addAlbum.php'>新增相簿</a> 
              <a href='logout.php'>登出【 $login_name 】</a>";
      }
    ?>
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