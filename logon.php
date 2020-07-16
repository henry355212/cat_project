<?php
  if (isset($_POST["account"]))
  {
    require_once("dbtools.inc.php");
		
    //取得登入資料
    $login_users = $_POST["account"]; 	
    $login_password = $_POST["password"];
	
    //建立資料連接
    $link = create_connection();
						
    //檢查帳號密碼是否正確
    $sql = "SELECT account, name FROM users Where account = '$login_users'
            AND password = '$login_password'";
    $result = execute_sql($link, "album", $sql);
	
    //若沒找到資料，表示帳號密碼錯誤
    if (mysqli_num_rows($result) == 0)
    {
      //釋放 $result 佔用的記憶體
      mysqli_free_result($result);
		
      //關閉資料連接	
      mysqli_close($link);
			
      //顯示訊息要求使用者輸入正確的帳號密碼
      echo "<script type='text/javascript'>alert('帳號密碼錯誤，請查明後再登入')</script>";
    }
    else     //如果帳號密碼正確
    {
      //將使用者資料加入 Session
      session_start();
      $row = mysqli_fetch_object($result);
      $_SESSION["login_users"] = $row->account;
      $_SESSION["login_name"] = $row->name;
	    
      //釋放 $result 佔用的記憶體	
      mysqli_free_result($result);
			
      //關閉資料連接	
      mysqli_close($link);
	        
      header("location:right-sidebar.php");
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>會員登入</title>
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
				<font face="標楷體" font size="20px" font color="white">會員登入</font>
			</div>
		</div>
	</div>
	<!-- Header -->

	<!-- Main -->
	<div id="main">
		<div id="content" class="container">
			<section>
				<header>
					<p align="center">歡迎來到本站，您必須加入成為本站的會員，才有權限使用本站的功能。</p>
					<p align="center">若您已經擁有帳號，請輸入您的帳號及密碼，然後按 [登入] 鈕；</p>
					<p align="center"> 若尚未成為本站會員，請點按 [加入會員] 超連結；</p>
					<p align="center"> 若您忘記自己的帳號及密碼，</p>
					<p align="center">請點按 [查詢密碼]。</p>
        <div align="center">
          <form action="logon.php" method="post" name="myForm">
      <table align="center">
        <tr> 
          <td> 
            帳號：
          </td>
          <td>
            <input type="text" name="account" size="15">
          </td>
        </tr>
        <tr> 
          <td> 
            密碼：
          </td>
          <td>
            <input type="password"name="password" size="15">
          </td>
        </tr>
        <tr>
          <td align="center" colspan="2"> 
            <input type="submit" value="登入">
            <input type="reset" value="重填">
          </td>
        </tr>
      </table>
    </form>
    </div>
    <p align="center">
						<a href="join.html">加入會員</a>　
						<a href="search_pwd.html">查詢密碼</a></p>
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