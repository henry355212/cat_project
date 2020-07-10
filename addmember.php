<?php
require_once("dbtools.inc.php");

//取得表單資料
$account = $_POST["account"];
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

//檢查帳號是否有人申請
$sql = "SELECT * FROM users Where account = '$account'";
$result = execute_sql($link, "member", $sql);

//如果帳號已經有人使用
if (mysqli_num_rows($result) != 0) {
  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);

  //顯示訊息要求使用者更換帳號名稱
  echo "<script type='text/javascript'>";
  echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
  echo "history.back();";
  echo "</script>";
}

//如果帳號沒人使用
else {
  //釋放 $result 佔用的記憶體	
  mysqli_free_result($result);

  //執行 SQL 命令，新增此帳號
  $sql = "INSERT INTO users (account, password, name, sex, 
            year, month, day, telephone, cellphone, address,
            email, url, comment) VALUES ('$account', '$password', 
            '$name', '$sex', $year, $month, $day, '$telephone', 
            '$cellphone', '$address', '$email', '$url', '$comment')";

  $result = execute_sql($link, "member", $sql);
}

//關閉資料連接	
mysqli_close($link);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>註冊成功</title>
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
          <li class="active"><a href="right-sidebar.html">曬貓區</a></li>
          <li><a href="forum.html">貓奴討論區</a></li>
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

          <p align="center"><img src="images/Success.jpg">
            <p align="center">恭喜您已經註冊成功了，您的資料如下：（請勿按重新整理鈕）<br>
              帳號：<font color="#FF0000"><?php echo $account ?></font><br>
              密碼：<font color="#FF0000"><?php echo $password ?></font><br>
              請記下您的帳號及密碼，然後<a href="right-sidebar.html">登入網站</a>。
            </p>
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
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
          </svg>
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