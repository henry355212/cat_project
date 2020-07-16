<?php
  require_once("dbtools.inc.php");
  header("Content-type: text/html; charset=utf-8");
  
  //取得表單資料
  $account = $_POST["account"]; 
  $email = $_POST["email"];
  $show_method = $_POST["show_method"]; 

  //建立資料連接
  $link = create_connection();
			
  //檢查查詢的帳號是否存在
  $sql = "SELECT name, password FROM users WHERE 
          account = '$account' AND email = '$email'";
  $result = execute_sql($link, "album", $sql);

  //如果帳號不存在
  if (mysqli_num_rows($result) == 0)
  {
    //顯示訊息告知使用者，查詢的帳號並不存在
    echo "<script type='text/javascript'>
            alert('您所查詢的資料不存在，請檢查是否輸入錯誤。');
            history.back();
          </script>";
  }
  else  //如果帳號存在
  {
    $row = mysqli_fetch_object($result);
    $name = $row->name;
    $password = $row->password;
    $message = "
      
    ";
	
    if ($show_method == "網頁顯示")
    {
      echo $message;   //顯示訊息告知使用者帳號密碼
    }
    
  }

  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);
		
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
            <?php echo $name ?>您好，您的帳號資料如下：<br><br>
          　　帳號：<font color="#FF0000"><?php echo $account ?></font><br>
          　　密碼：<font color="#FF0000"><?php echo $password ?></font><br><br>
            <a href='http://localhost/cat_project/no-sidebar.html'>按此重新登入本站</a>
</div>
          </body>
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