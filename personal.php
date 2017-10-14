<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./dist/css/jumbotron.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="demo.php">任务辣么多</a>
        </div>
      </div>
    </nav>
    <div class="jumbotron">

      <div class="container">
      	<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a href="personal.php">信息</a></li>
		  <li role="presentation"><a href="notRec.php">未被接受任务</a></li>
		  <li role="presentation"><a href="hasRec.php">已被接受任务</a></li>
		  <li role="presentation"><a href="rec.php">已接受任务</a></li>
		  <li role="presentation"><a href="com.php">已完成任务</a></li>
		</ul>
		<table class="table table-striped">
              <thead>
                <tr>
                  <td class="info"><h5>我的信息</h5></td>
                  <td class="info"></td>
                </tr>
              </thead>
              <tbody>
              <?php 
		 		if (isset($_COOKIE['login']) && $_COOKIE['login'] == 1 && isset($_COOKIE['userPhone'])){
					$link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
					// if (!$link) {
					// 	# code...
					// 	echo "数据库连接失败";
					// }else{
					// 	echo "数据库连接成功";
					// }
					//连接成功

					$sql_pubuser = "SELECT * FROM usertable WHERE phoneNum = {$_COOKIE['userPhone']}";
					$result_pubuser = mysqli_query($link, $sql_pubuser);
					if(!$result_pubuser) die("<h4 class='h4'>查询失败</h4>".$sql_pubuser);
					$rows_pubuser = mysqli_fetch_array($result_pubuser, MYSQLI_ASSOC);
					//var_dump($rows_pubuser);
					$userPhone = $rows_pubuser['phoneNum'];
					$userName = $rows_pubuser['name'];
					
					$sql_pub = "SELECT COUNT(missionID) AS pubNum FROM mission WHERE pubPhone={$userPhone}";
				    $result_pub = mysqli_query($link, $sql_pub);
				    if(!$result_pub) die("<h4 class='h4'>查询失败</h4>".$sql_pub);

				    $sql_rec = "SELECT COUNT(missionID) AS recNum FROM mission WHERE recPhone={$userPhone}";
				    $result_rec = mysqli_query($link, $sql_rec);
				    if(!$result_rec) die("<h4 class='h4'>查询失败</h4>".$sql_rec);

					// $rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC);
				 //    var_dump($rows_pub);

				    if(isset($rows_pubuser)){
				    	$rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC);
				    	$rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC);
				    	$pubNum = $rows_pub['pubNum'];
				    	$recNum = $rows_rec['recNum'];
				    	// var_dump($rows_pub);
				    	// var_dump($rows_rec);

				    	if ($rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC)) {
				    		# code...
				    	

				    	do {
				    		$pubNum++;
				    	}while ($rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC));
				    }

				    	if ($rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC)) {
				    		# code...
				    	
						do {
				    		$recNum++;
				    	}while ($rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC));
				    }
						//$recNum = count($rows_rec)%15;

				    	echo "<tr>";
	      				echo "<td class=\"col-md-2\">我的姓名</td>";
	      				echo "<td>{$userName}</td>";
		      			echo "</tr>";
		      			echo "<tr>";
	      				echo "<td class=\"col-md-2\">我的手机</td>";
	      				echo "<td>{$userPhone}</td>";
		      			echo "</tr>";
		      			echo "<tr>";
	      				echo "<td class=\"col-md-2\">我发布的任务数</td>";
	      				echo "<td>{$pubNum}</td>";
		      			echo "</tr>";
		      			echo "<tr>";
	      				echo "<td class=\"col-md-2\">我接受的任务数</td>";
	      				echo "<td>{$recNum}</td>";
		      			echo "</tr>";
				    }

			}
			?>
			</tbody>
         </table>
         <?php 
         	echo "<a class='btn btn-success' href='modPer.php'>修改信息</a>";
          ?>
			

		</div>
    </div>

</body>
</html>