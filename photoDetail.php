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
      $album_id = $_GET["album"];
      $photo_id = $_GET["photo"];
      
      //建立資料連接
      $link = create_connection();
      
      //取得並顯示相簿名稱
      $sql = "SELECT name FROM album WHERE id = $album_id";
      $result = execute_sql($link, "album", $sql);
      $album_name = mysqli_fetch_object($result)->name;      
      echo "<p align='center'>$album_name</p>";
      
      //取得並顯示相片資料
      $sql = "SELECT filename, comment FROM photo WHERE id = $photo_id";
      $result = execute_sql($link, "album", $sql);
      $row = mysqli_fetch_object($result);
      $file_name = $row->filename;
      $comment = $row->comment;      
      echo "<p align='center'><img src='Photo/$file_name'
            style='border-style:solid;border-width:1px'></p>";
      echo "<p align='center'>$comment</p>";
		  
      //取得並建立相片導覽資料
      $sql = "SELECT a.id, a.filename FROM (SELECT id, filename FROM photo 
              WHERE album_id = $album_id AND (id <= $photo_id)
              ORDER BY id desc) a ORDER BY a.id";
      $result = execute_sql($link, "album", $sql);
      
      echo "<hr><p align='center'>";
      while ($row = mysqli_fetch_assoc($result))
      {
      	if ($row["id"] == $photo_id)
      	{
      	  echo "<img src='Thumbnail/" . $row["filename"] .
      	       "' style='border-style:solid;border-color: Red;border-width:2px'>　";
      	}
      	else
      	{
      	  echo "<a href='photoDetail.php?album=$album_id&photo=" . $row["id"] .
      	       "'><img src='Thumbnail/" . $row["filename"] .
      	       "' style='border-style:solid;border-color:Black;border-width:1px'></a>　";
      	}
      }      
      
      $sql = "SELECT id, filename FROM photo WHERE album_id = $album_id AND (id > $photo_id)
              ORDER BY id";			  
      $result = execute_sql($link, "album", $sql);      
      while ($row = mysqli_fetch_assoc($result))
      {
      	echo "<a href='photoDetail.php?album=$album_id&photo=" . $row["id"] .
      	     "'><img src='Thumbnail/" . $row["filename"] .
      	     "' style='border-style:solid;border-color:Black;border-width:1px'></a>　";
      }      
      echo "</p>";
		  		
      //釋放記憶體
      mysqli_free_result($result);
	  //關閉資料連接
      mysqli_close($link);
    ?>
    <p align="center">
      <a href="index.php">回首頁</a>
      <a href="showAlbum.php?album_id=<?php echo $album_id ?>">回【<?php echo $album_name ?>】相簿
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