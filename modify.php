<?php
//檢查 cookie 中的 passed 變數是否等於 TRUE 
$passed = $_COOKIE{
"passed"};

//如果 cookie 中的 passed 變數不等於 TRUE
//表示尚未登入網站，將使用者導向首頁 index.html
if ($passed != "TRUE") {
  header("location:index.html");
  exit();
}

//如果 cookie 中的 passed 變數等於 TRUE
//表示已經登入網站，取得使用者資料	
else {
  require_once("dbtools.inc.php");

  $id = $_COOKIE{
  "id"};

  //建立資料連接
  $link = create_connection();

  //執行 SELECT 陳述式取得使用者資料
  $sql = "SELECT * FROM users Where id = $id";
  $result = execute_sql($link, "album", $sql);

  $row = mysqli_fetch_assoc($result);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>修改會員資料</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <script type="text/javascript">
      function check_data() {
        if (document.myForm.password.value.length == 0) {
          alert("「使用者密碼」一定要填寫哦...");
          return false;
        }
        if (document.myForm.password.value.length > 10) {
          alert("「使用者密碼」不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.re_password.value.length == 0) {
          alert("「密碼確認」欄位忘了填哦...");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value) {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
          return false;
        }
        if (document.myForm.name.value.length == 0) {
          alert("您一定要留下真實姓名哦！");
          return false;
        }
        if (document.myForm.year.value.length == 0) {
          alert("您忘了填「出生年」欄位了...");
          return false;
        }
        if (document.myForm.month.value.length == 0) {
          alert("您忘了填「出生月」欄位了...");
          return false;
        }
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1) {
          alert("「出生月」應該介於 1-12 之間哦！");
          return false;
        }
        if (document.myForm.day.value.length == 0) {
          alert("您忘了填「出生日」欄位了...");
          return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29) {
          alert("二月只有 28 天，最多 29 天");
          return false;
        }
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6 |
          document.myForm.month.value == 9 | document.myForm.month.value == 11) {
          if (document.myForm.day.value > 30) {
            alert("4 月、6 月、9 月、11 月只有 30 天哦！");
            return false;
          }
        } else {
          if (document.myForm.day.value > 31) {
            alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
            return false;
          }
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1) {
          alert("出生日應該在 1-31 之間");
          return false;
        }
        myForm.submit();
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
        <div id="logo">
          <font face="標楷體" font size="20px" font color="white">修改會員資料</font>
        </div>
      </div>
    </div>
    <!-- Header -->

    <!-- Main -->
    <div id="main">
      <div id="content" class="container">
        <section>
          <header >
            <div align="center">
            <!-- <p align="center"><img src="images/modify.jpg"></p> -->
            <form name="myForm" method="post" action="update.php">
              <table border="2" align="center" bordercolor="#6666FF">
                <tr>
                  <td colspan="2" bgcolor="#ADADAD" align="center">
                    <font color="#FFFFFF">請填入下列資料 (標示「*」欄位請務必填寫)</font>
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">使用者帳號(*)：</td>
                  <td><?php echo $row{"account"} ?></td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">使用者密碼(*)：</td>
                  <td>
                    <input type="password" name="password" size="15" value="<?php echo $row{"password"} ?>">
                    (請使用英文或數字鍵，勿使用特殊字元)
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">密碼確認(*)：</td>
                  <td>
                    <input type="password" name="re_password" size="15" value="<?php echo $row{"password"} ?>">
                    (再輸入一次密碼，並記下您的使用者名稱與密碼)
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">姓名(*)：</td>
                  <td><input type="text" name="name" size="8" value="<?php echo $row{"name"} ?>"></td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">性別(*)：</td>
                  <td>
                    <input type="radio" name="sex" value="男" checked>男
                    <input type="radio" name="sex" value="女">女
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">生日(*)：</td>
                  <td>民國
                    <input type="text" name="year" size="2" value="<?php echo $row{"year"} ?>">年
                    <input type="text" name="month" size="2" value="<?php echo $row{"month"} ?>">月
                    <input type="text" name="day" size="2" value="<?php echo $row{"day"} ?>">日
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">電話：</td>
                  <td>
                    <input type="text" name="telephone" size="20" value="<?php echo $row{"telephone"} ?>">
                    (依照 (02) 2311-3836 格式 or (04) 657-4587)
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">行動電話：</td>
                  <td>
                    <input type="text" name="cellphone" size="20" value="<?php echo $row{"cellphone"} ?>">
                    (依照 (0922) 302-228 格式)
                  </td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">地址：</td>
                  <td><input type="text" name="address" size="45" value="<?php echo $row{"address"} ?>"></td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td align="right">E-mail 帳號(*)：</td>
                  <td><input type="text" name="email" size="30" value="<?php echo $row{"email"} ?>"></td>
                </tr>
                <!-- <tr bgcolor="#F0F0F0"> 
          <td align="right">個人網站：</td>
          <td><input type="text" name="url" size="40" value="<?php echo $row{"url"} ?>"></td>
        </tr> -->
                <tr bgcolor="#F0F0F0">
                  <td align="right">備註：</td>
                  <td><textarea name="comment" rows="4" cols="45"><?php echo $row{"comment"} ?></textarea></td>
                </tr>
                <tr bgcolor="#F0F0F0">
                  <td colspan="2" align="CENTER">
                    <input type="button" value="修改資料" onClick="check_data()">
                    <input type="reset" value="重新填寫">
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
        Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
      </div>
    </div>


  </body>

  </html>
<?php
  //釋放資源及關閉資料連接
  mysqli_free_result($result);
  mysqli_close($link);
}
?>