<?php 
 ?>
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
      	<ul class="nav nav-tabs">
		  <li role="presentation" ><a href="personal.php">信息</a></li>
		  <li role="presentation" class="active"><a href="notRec.php" >未被接受任务</a></li>
		  <li role="presentation"><a href="hasRec.php">已被接受任务</a></li>
		  <li role="presentation"><a href="rec.php">已接受任务</a></li>
		  <li role="presentation"><a href="com.php">已完成任务</a></li>
		</ul>
		<table class="table table-striped">
              <thead>
                <tr>
                  <td class="info"><h5>任务名称</h5></td>
                  <td class="info"><h5>标签</h5></td>
                  <td class="info"><h5>发布时间</h5></td>
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
					$sql_pub = "SELECT * FROM mission WHERE pubPhone={$_COOKIE['userPhone']}";
				    $result_pub = mysqli_query($link, $sql_pub);
				    if(!$result_pub) die("<h4 class='h4'>查询失败</h4>".$sql);

				    // $sql_rec = "SELECT * FROM mission WHERE recPhone={$_COOKIE['userPhone']}";
				    // $result_rec = mysqli_query($link, $sql_rec);
				    // if(!$result_rec) die("<h4 class='h4'>查询失败</h4>".$sql);


	                  while ($rows = mysqli_fetch_array($result_pub,MYSQLI_ASSOC )) {
	                    # code...
	                    //var_dump($rows);
	                    if ($rows['missionSta'] == '未被接受'){
	                      echo "<tr>";
	                      echo "<td class='active'>{$rows['missionName']}</td>";
	                      echo "<td class='active'>{$rows['tab']}</td>";
	                      echo "<td class='active'>{$rows['pubDate']}</td>";
	                      //echo "<td class='active'>{$rows['pubPhone']}</td>";
	                      echo "<td class='active'><a href=\"missionCon.php?missionID={$rows['missionID']}\" 
	                            class=\"label label-danger\">查看详情</a></td>";
	                      echo "</tr>";
	                    }
	                    
	                  }

			}
			?>
			</tbody>
         </table>
			

		</div>
    </div>

</body>
</html>