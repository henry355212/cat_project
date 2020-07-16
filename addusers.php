<?php
  if (isset($_POST["usersss_name"]))
  {
    require_once("dbtools.inc.php");
    $usersss_name = $_POST["usersss_name"];
  	
    //取得登入者帳號
    session_start();
    $login_userss = $_SESSION["login_userss"];

    //建立資料連接
    $link = create_connection();

    //新增相簿

    $sql = "SELECT ifnull(max(id), 0) + 1 AS id FROM usersss";
    $result = execute_sql($link, "usersss", $sql);
    $usersss_id = mysqli_fetch_object($result)->usersss_id;

    $sql = "INSERT INTO usersss(id, name, owner)
      VALUES($usersss_id, '$usersss_name', '$login_usersss')";

    execute_sql($link, "usersss", $sql);
  	
    //釋放記憶體並關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
    
    header("location:showusersss.php?usersss_id=$usersss_id");
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
    <form action="addusersss.php" method="post">
      <table align="center">
        <tr> 
          <td> 
            相簿名稱：
          </td>
          <td>
            <input type="text" name="usersss_name" size="15">
            <input type="submit" value="新增">
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <br><a href="index.php">回首頁</a>
          </td>	
        </tr>
      </table>
    </form>
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