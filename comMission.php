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
			// if (!$link) {
			// 	# code...
			// 	echo "数据库连接失败";
			// }else{
			// 	echo "数据库连接成功";
			// }
			//连接成功

			$missionID = $_GET['missionID'];
			$missionSta = "已完成";

			$sql_up = "UPDATE 
							mission
						SET
							missionSta = '{$missionSta}'
						WHERE 
							missionID = '{$missionID}'
						";
			$result_up = mysqli_query($link, $sql_up);

			if (!$result_up) {
				# code...
				echo "数据库查询失败".$sql_up;
			}else{
				echo "<h4 class='h4 text-center'>完成成功，请<a href='com.php'>点击</a>查看 </h4>";
			}
			//$rows_up = mysqli_fetch_array($result_up, MYSQLI_ASSOC);

		 ?>			

		</div>
    </div>

</body>
</html>