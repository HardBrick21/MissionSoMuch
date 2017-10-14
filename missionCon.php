<!DOCTYPE html>
<html lang="en">
<?php $missionID = $_GET['missionID']; ?>
<head>
	<meta charset="UTF-8">
	<title>任务详情</title>
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
     	 <?php echo "<form action=\"recMission.php?missionID={$missionID}\" method=\"post\">" ?>
			
			<div class="col-md-12"> 
	      		<table class="table table-striped table-bordered">
	      
					<?php 
						$link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
						// if (!$link) {
						// 	# code...
						// 	echo "数据库连接失败";
						
					    $sql = "SELECT * FROM mission WHERE missionID={$missionID}";
					    $result = mysqli_query($link, $sql);
					    if(!$result) die("<h4 class='h4'>查询失败</h4>".$sql);
					    //$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
					    if ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					    	# code...
					    	//var_dump($rows);
						    echo "<tr>";
		      				echo "<td class=\"col-md-2\">任务名称</td>";
		      				echo "<td>{$rows['missionName']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">任务内容</td>";
		      				echo "<td>{$rows['missionCon']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">发布时间</td>";
		      				echo "<td>{$rows['pubDate']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">发布人姓名</td>";
		      				echo "<td>{$rows['pubName']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">发布人手机</td>";
		      				echo "<td>{$rows['pubPhone']}</td>";
			      			echo "</tr>";
		      				echo "<td class=\"col-md-2\">接受人姓名</td>";
		      				echo "<td>{$rows['recName']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">接受人手机</td>";
		      				echo "<td>{$rows['recPhone']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">任务标签</td>";
		      				echo "<td>{$rows['tab']}</td>";
			      			echo "</tr>";
			      			echo "<tr>";
		      				echo "<td class=\"col-md-2\">任务时限</td>";
		      				echo "<td>{$rows['timeLimit']}</td>";
			      			echo "</tr>";
			      			echo "</table>";

			      			if ($_COOKIE['userPhone'] == $rows['pubPhone']) {
			      				# code...
			      				echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">不能接受自己发布的任务</button>";

			      			}else if ($_COOKIE['userPhone'] == $rows['recPhone'] && $rows['missionSta'] == '已接受') {
			      				echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">您已接受，请尽快完成</button>";
			      			}else if ($rows['missionSta'] == '已完成') {
			      				echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">任务已完成</button>";
			      			}
			      			else{

			      				echo "<input  type = 'submit' class='btn btn-success' name='rec' value='接受'>";
			      			}

			      			echo "<a class='btn btn-warning' href='demo.php'>返回</a>";

			      		}else{
			      			echo "任务不唯一，请重试";
			      		}
			      			
				 ?>
			      		
				
				</div>
			</form>
		</div>
    </div>

</body>
</html>