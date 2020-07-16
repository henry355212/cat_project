<?php
//檢查 cookie 中的 passed 變數是否等於 TRUE
$passed = $_COOKIE["passed"];

/*  如果 cookie 中的 passed 變數不等於 TRUE，
      表示尚未登入網站，將使用者導向首頁 index.html */
if ($passed != "TRUE") {
  header("location:index.html");
  exit();
}

/*  如果 cookie 中的 passed 變數等於 TRUE，
      表示已經登入網站，將使用者的帳號刪除 */ else {
  require_once("dbtools.inc.php");

  $id = $_COOKIE["id"];

  //建立資料連接
  $link = create_connection();

  //刪除帳號
  $sql = "DELETE FROM users Where id = $id";
  $result = execute_sql($link, "album", $sql);

  //關閉資料連接
  mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>刪除會員資料成功</title>
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
        <p align="center"><img src="images/erase.jpg"></p>
        <p align="center">
          您的資料已從本站中刪除，若要再次使用本站台服務，請重新申請，謝謝。
        </p>
        <p align="center"><a href="index.html">回首頁</a></p>
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
    Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
  </div>
</div>

</html>