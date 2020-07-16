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
      function check_data()
      {
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
	<div id="main" align="center">
		<div id="content" class="container">
			<section>
				<!-- <header>
        <p align="center"><img src="images/head.jpg"></p> -->
    <?php
      require_once("dbtools_news.inc.php");
			
      //指定每頁顯示幾筆記錄
      $records_per_page = 5;
			
      //取得要顯示第幾頁的記錄
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
				
      //建立資料連接
      $link = create_connection();
					
      //執行SQL查詢
      // $sql = "SELECT id, author, subject, date FROM message ORDER BY date DESC";
      $sql = "SELECT id, name, subject, date FROM message ORDER BY date DESC";
      $result = execute_sql($link, "news", $sql);
				
      //取得記錄數
      $total_records = mysqli_num_rows($result);
			
      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);
			
      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);
			
      //將記錄指標移至本頁第一筆記錄的序號
      mysqli_data_seek($result, $started_record);

      echo "<table height='200' width='800' cellspacing='2'>";
			
      //使用 $bg 陣列來儲存表格背景色彩
      $bg[0] = "#E0E0E0";
      $bg[1] = "#F0F0F0";
      $bg[2] = "#E0E0E0";
      $bg[3] = "#F0F0F0";
      $bg[4] = "#E0E0E0";					
	  
      //顯示記錄
      $j = 1;
      while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr>";
        // echo "<td bgcolor='" . $bg[$j - 1] . "'>作者：" . $row["author"] . "<br>";
        echo "<td bgcolor='" . $bg[$j - 1] . "'>作者：" . $row["name"] . "<br>";
        echo "主題：" . $row["subject"] . "<br>";
        echo "時間：" . $row["date"] . "<br>";
        echo "<a href='show_news.php?id=";
        // echo "<a href='show_news.php?num=";
        // echo $row["num"] . "'>閱讀與加入討論</a></td></tr>";	
        echo $row["id"] . "'>閱讀與加入討論</a></td></tr>";				
        $j++;
      }
      echo "</table>" ;
			
      //產生導覽列
      echo "<p align='center'>";
			
      if ($page > 1)
        echo "<a href='forum.php?page=". ($page - 1) . "'>上一頁</a> ";
				
      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='forum.php?page=$i'>$i</a> ";		
      }
			
      if ($page < $total_pages)
        echo "<a href='forum.php?page=". ($page + 1) . "'>下一頁</a> ";			
				
      echo "</p>";
			
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?> 		
    <hr>
    <!-- 顯示輸入新留言表單 --> 
    <form name="myForm" method="post" action="post.php">
      <table border="0" width="800" align="center" cellspacing="0">
        <tr bgcolor="#ADADAD" align="center">
          <td colspan="2"><font color="white">請在此輸入新的討論</font></td>
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
            <input type="button" value="張貼討論" onClick="check_data()">　
            <input type="reset" value="重新輸入">
          </td>  
        </tr>
      </table>   
    </form>
				<!-- </header> -->


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

	<Footer>
	<div id="footer">
		<div class="container">
			<section>
				<header>
					<h2>聯絡我們</h2>					
				</header>
				<ul class="contact">
					<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
					  </svg>					
				</ul>
			</section>
		</div>
	</div>
	</Footer>

	<!-- Copyright -->
	<div id="copyright">
		<div class="container">
			Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a
				href="http://unsplash.com/cc0">CC0</a>)
		</div>
	</div>
   
  </body>
</html>