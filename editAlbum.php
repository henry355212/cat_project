<?php
  require_once("dbtools.inc.php");
  
  //取得登入者帳號
  session_start();
  $login_users = $_SESSION["login_users"];
  
  //建立資料連接
  $link = create_connection();
    
  if (!isset($_POST["album_id"]))
  {
    $album_id = $_GET["album_id"];
  														
    //取得相簿名稱及相簿所有者的帳號
    $sql = "SELECT name, owner FROM album where id = $album_id";
    $result = execute_sql($link, "album", $sql);
    $row = mysqli_fetch_object($result);
    $album_name = $row->name;
    $album_owner = $row->owner;
      
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //關閉資料連接	
    mysqli_close($link);
  
    if ($album_owner != $login_users)
    {
      echo "<script type='text/javascript'>";
      echo "alert('您不是相簿的主人，無法修改相簿名稱。$album_owner');";
      echo "</script>";
    }
  }
  else
  {
    $album_id = $_POST["album_id"];
    $album_name = $_POST["album_name"];
    $sql = "UPDATE album SET name = '$album_name'
            WHERE id = $album_id AND owner = '$login_users'";
    execute_sql($link, "album", $sql);
  			
    //關閉資料連接	
    mysqli_close($link);
    
    header("location:right-sidebar.php");
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
    <form action="editAlbum.php" method="post">
      <table align="center">
        <tr> 
          <td> 
            相簿名稱：
          </td>
          <td>
            <input type="text" name="album_name" size="15"
              value="<?php echo $album_name ?>">
            <input type="hidden" name="album_id" value="<?php echo $album_id ?>">
            <input type="submit" value="更新"
              <?php if ($album_owner != $login_users) echo 'disabled' ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br><a href="right-sidebar.php">回曬貓區</a>
          </td>	
        </tr>
      </table>
    </form>
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