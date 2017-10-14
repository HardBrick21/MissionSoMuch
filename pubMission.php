<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./dist/css/jumbotron.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="demo.php">任务辣么多</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right">
        <?php 
        	date_default_timezone_set('Asia/Shanghai');
            if (isset($_COOKIE['login']) && $_COOKIE['login'] == 1 && isset($_COOKIE['userPhone'])){
                echo "<label class='text-info'>亲爱的用户{$_COOKIE['userPhone']}，您好 &raquo </label>";
                echo "<a class='btn btn-success' href='personal.php'>个人中心</a>";
              }else{
                echo "<a class='btn btn-warning' href='login.html'>登 陆</a>";
              }
            
            ?>
          </form>
        </div>
      </div>
    </nav>
    <div class="jumbotron">

      <div class="container">

	<?php 
		$link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
		if (!$link) {
			# code...
			echo "数据库连接失败";
		}
		$sql = "SELECT * FROM usertable";
		$result_user = mysqli_query($link, $sql);
		if(!$result_user) die("数据库查询错误".$sql);

		//var_dump($userMes);

		$missionName = $_POST['missionName'];
		$missionCon = $_POST['missionContent'];
		$pubDate = date('Y-m-d H:i:s',time());
		$pubPhone = $_COOKIE['userPhone'];
		$timeLimit = $_POST['timeLimit'];
		$missionStatus = "未被接受";
		

		$sql_NAME = "SELECT * FROM usertable WHERE phoneNum = {$pubPhone}";
		$result_NAME = mysqli_query($link, $sql_NAME);
		$rows_NAME = mysqli_num_rows($result_NAME);
		if ($rows_NAME == 1) {

			$re = mysqli_fetch_array($result_NAME, MYSQLI_ASSOC);

			//var_dump($re);
			
			$pubName = $re['name'];
		}else{
			echo "<h4 class='h4 text-center'>发布失败，请<a href='pubMission.html'>点击</a>重试 </h4>";
		}

		$tab = $_POST['tag'];

		$sql_IN = "INSERT INTO mission (missionName, missionCon, pubPhone, pubName, timeLimit, tab, missionSta, pubDate)
		VALUES ('{$missionName}','{$missionCon}','{$pubPhone}','{$pubName}', '{$timeLimit}','{$tab}','{$missionStatus}','{$pubDate}')";

		$result_IN = mysqli_query($link, $sql_IN);

		if (!$result_IN) {
			# code...
			echo"<h4 class='h4 text-center'>发布失败，插入数据库失败，请<a href='pubMission.html'>点击</a>重试 </h4>";
			var_dump(mysqli_error($link));

			echo "$sql_IN";
		}else{
			echo "<h4 class='h4 text-center'>发布成功，请<a href='demo.php'>点击</a>返回首页 </h4>";
		}
		
		

	 ?>

		</div>
    </div>

</body>
</html>