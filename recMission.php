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

			$recPhone = $_COOKIE['userPhone'];
			$recDate = date('Y-m-d H:i:s',time());

			$missionID = $_GET['missionID'];
			$missionSta = "已接受";

			$sql_rec = "SELECT * FROM usertable WHERE phoneNum={$recPhone}";
			$result_rec = mysqli_query($link, $sql_rec);
			if (!$result_rec) {
				# code...
				echo "数据库查询失败".$sql_rec;
			}
			$rows_rec = mysqli_fetch_array($result_rec, MYSQLI_ASSOC);

			$recName = $rows_rec['name'];
			//var_dump($rows_rec);


			$sql_up = "UPDATE 
							mission 
						SET 
							recPhone = '{$recPhone}', 
							recName = '{$recName}', 
							missionSta = '{$missionSta}', 
							recDate = '{$recDate}'
						WHERE
							missionID = '{$missionID}' ";
			$result_up = mysqli_query($link, $sql_up);
			if (!$result_up) {
				# code...
				echo "数据库查询失败".$sql_up;
			}else{
				echo "<h4 class='h4 text-center'>接受成功，请<a href='demo.php'>点击</a>返回首页 </h4>";
			}


	 ?>

		</div>
    </div>

</body>
</html>