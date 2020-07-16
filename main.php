<?php
//檢查 cookie 中的 passed 變數是否等於 TRUE
$passed = $_COOKIE["passed"];

/*  如果 cookie 中的 passed 變數不等於 TRUE
      表示尚未登入網站，將使用者導向首頁 main.html	*/
if ($passed != "TRUE") {
  header("location:main.html");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>會員管理</title>
  <meta charset="utf-8">
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
        <font face="標楷體" font size="20px" font color="white">會員專區</font>
      </div>
    </div>
  </div>
  <!-- Header -->

  <!-- Main -->
  <div id="main">
    <div id="content" class="container">
      <section>
        <header>
          <!-- <p align="center"><img src="images/management.jpg"></p> -->
          <p align="center">
            <a href="modify.php">修改會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="delete.php">刪除會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="right-sidebar.php">曬貓區</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="forum.html">貓奴討論區</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="logout.php">登出網站</a>
          </p>
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

</body>

</html>