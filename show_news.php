<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>貓奴討論區</title>

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
      // if (document.myForm.author.value.length == 0)
      if (document.myForm.name.value.length == 0)
        alert("作者欄位不可以空白哦！");
      else if (document.myForm.subject.value.length == 0)
        alert("主題欄位不可以空白哦！");
      else if (document.myForm.content.value.length == 0)
        alert("內容欄位不可以空白哦！");
      else
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
          <li class="active"><a href="right-sidebar.html">曬貓區</a></li>
          <li><a href="forum.php">貓奴討論區</a></li>
          <li><a href="no-sidebar.html">會員登入</a></li>
          <li><a href="related-websites.html">相關網站</a></li>
        </ul>
      </nav>
    </div>
    <div class="container">

      <!-- Logo -->
      <div id="logo">
        <font face="標楷體" font size="20px" font color="white">貓奴討論區</font>
      </div>
    </div>
  </div>
  <!-- Header -->


    <!-- Main -->
      <!-- Main -->
      
	<div id="main" align="center">
		<div id="content" class="container">
			<section>






  <?php
  require_once("dbtools_news.inc.php");

  //取得要顯示之記錄
   $id = $_GET["id"];
 
  //建立資料連接
  $link = create_connection();

  //執行SQL查詢
  $sql = "SELECT * FROM message WHERE id =$id";
  $result = execute_sql($link, "news", $sql);

  echo "<table width='800' align='center' cellpadding='3'>";
  echo "<tr height='40'><td colspan='2' align='center'
            bgcolor='#ADADAD'><font color='#4169E1'>
            <b>討論主題</b></font></td></tr>";

  //顯示原討論主題的內容
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td bgcolor='#F0F0F0'>主題：" . $row["subject"] . "　";
    // echo "作者：" . $row["author"] . "　";
    echo "作者：" . $row["name"] . "　";
    echo "時間：" . $row["date"] . "</td></tr>";
    echo "<tr height='40'><td bgcolor='E0E0E0'>";
    echo $row["content"] . "</td></tr>";
  }

  echo "</table>";

  //釋放 $result 佔用的記憶體空間
  mysqli_free_result($result);

  //執行 SQL 命令
  $sql = "SELECT * FROM reply_message WHERE reply_id = $id";
  $result = execute_sql($link, "news", $sql);

  if (mysqli_num_rows($result) <> 0) {
    echo "<hr>";
    echo "<table width='800' align='center' cellpadding='3'>";
    echo "<tr height='40'><td colspan='2' align='center'
              bgcolor='#99CCFF'><font color='#FF3366'>
              <b>回覆主題</b></font></td></tr>";

    //顯示回覆主題的內容
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td bgcolor='#FFFF99'>主題：" . $row["subject"] . "　";
      // echo "作者：" . $row["author"] . "　";
      echo "作者：" . $row["name"] . "　";
      echo "時間：" . $row["date"] . "</td></tr>";
      echo "<tr><td bgcolor='CCFFFF'>";
      echo $row["content"] . "</td></tr>";
    }

    echo "</table>";
  }

  //釋放記憶體空間
  mysqli_free_result($result);
  mysqli_close($link);
  ?>
  
  <hr>
  <form name="myForm" method="post" action="post_reply.php">
    <!-- <input type="hidden" name="reply_id" value="<?php echo $id ?>"> -->
    <input type="hidden" name="reply_id" value="<?php echo $id ?>">
    <table border="0" width="800" align="center" cellspacing="0">
      <tr bgcolor="#ADADAD" align="center">
        <td colspan="2">
          <font color="white">請在此輸入您的回覆</font>
        </td>
      </tr>
      <tr bgcolor="#F0F0F0">
        <td width="15%">作者</td>
        <!-- <td width="85%"><input name="author" type="text" size="79"></td> -->
        <td width="85%"><input name="name" type="text" size="79"></td>
      </tr>
      <tr bgcolor="#ADADAD">
        <td width="15%">主題</td>
        <td width="85%"><input name="subject" type="text" size="79"></td>
      </tr>
      <tr bgcolor="#F0F0F0">
        <td width="15%">內容</td>
        <td width="85%"><textarea name="content" cols="80" rows="5"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" height="40" align="center">
          <input type="button" value="回覆討論" onClick="check_data()">
          <input type="reset" value="重新輸入">
        </td>
      </tr>
    </table>
  </form>
  <input type ="button" onclick="history.back()" value="回上一頁"></input>
	</section>
		</div>
	</div>






  <div id="tweet">
    <div class="container">
      <section>
        <blockquote>&ldquo;支持領養，決不棄養&rdquo;</blockquote>
        <blockquote>&ldquo;ADOPT , DON'T ABANDON&rdquo;</blockquote>
      </section>
    </div>
  </div>

  <Footer>
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
  </Footer>

  <div id="copyright">
    <div class="container">
      Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
    </div>
  </div>





</body>

</html>