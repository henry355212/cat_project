<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /* 如果 cookie 中的 passed 變數不等於 TRUE，
     表示尚未登入網站，將使用者導向首頁 index.html */
  if ($passed != "TRUE")
  {
    header("location:index.html");
    exit();
  }
	
  /* 如果 cookie 中的 passed 變數等於 TRUE，
     表示已經登入網站，則取得使用者資料 */
  else
  {
    require_once("dbtools.inc.php");
	
    //取得 modify.php 網頁的表單資料
    $id = $_COOKIE["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $telephone = $_POST["telephone"];
    $cellphone = $_POST["cellphone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $url = $_POST["url"];
    $comment = $_POST["comment"];
		
    //建立資料連接
    $link = create_connection();
				
    //執行 UPDATE 陳述式來更新使用者資料
    $sql = "UPDATE users SET password = '$password', name = '$name', 
            sex = '$sex', year = $year, month = $month, day = $day, 
            telephone = '$telephone', cellphone = '$cellphone', 
            address = '$address', email = '$email', url = '$url', 
            comment = '$comment' WHERE id = $id";
    $result = execute_sql($link, "album", $sql);
		
    //關閉資料連接
    mysqli_close($link);
  }		
?>
<!DOCTYPE html>
<html>
  <head>
    <title>修改會員資料成功</title>
    <meta charset="utf-8">    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
	<script src="js/init.js"></script>
  </head>
  <body>
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
        <center>
      <img src="images/revise.jpg"><br><br>
      <?php echo $name ?>，恭喜您已經修改資料成功了。
      <p><a href="main.php">回會員專屬網頁</a></p>
    </center> 
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