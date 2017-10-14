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
              $missionID = $_GET['missionID'];
              $link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
				//$missionAss = $_POST['assMission_php'];

				$sql_up = "SELECT * FROM mission WHERE missionID = {$missionID}";
				$result_up = mysqli_query($link, $sql_up);

				$rows_up = mysqli_fetch_array($result_up, MYSQLI_ASSOC);

				$contenAss = $rows_up['contentAss'];
				$completeAss = $rows_up['completeAss'];

             
            
            ?>
          </form>
        </div>
      </div>
    </nav>
    <div class="jumbotron">

      <div class="container">

		<h4 class="h4 lead text-center">评价任务</h4>
		<?php  
		if ($rows_up['recPhone'] == $_COOKIE['userPhone']) {
			# code...
		
			echo "<form action=\"assMission_rec.php?missionID={$missionID}\" method=\"post\" >";
		}else{
			echo "<form action=\"assMission_pub.php?missionID={$missionID}\" method=\"post\" >";
		}
			?>
		
<!-- 		<div class="form-group">
          <label for="missionName">任务标题</label>
          <input type="text" class="form-control" id="missionName" name="missionName" placeholder="标题">
         </div> -->
        <div class="form-group">
          <label for="missionContent">评价内容</label>
          <textarea class="form-control" rows="3" name="assMission"></textarea>
        </div>
        <?php 

		  //       $link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
				// //$missionAss = $_POST['assMission_php'];
				// $sql_up = "SELECT * FROM mission WHERE missionID = {$missionID}";
				// $result_up = mysqli_query($link, $sql_up);

				// $rows_up = mysqli_fetch_array($result_up, MYSQLI_ASSOC);

				// $contenAss = $rows_up['contentAss'];

				if ($contenAss == "" && $rows_up['recPhone'] == $_COOKIE['userPhone']) {
					echo " <input type=\"submit\" class=\"btn btn-success\" value=\"评价发布人\">";
					
				} else{
					if ($contenAss == "") {
						# code...
						echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">等待对评价发布人</button>";
					}else {
					echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">您已完成对发布人的评价</button>";
					}
				}
				if ($completeAss == "" && $rows_up['pubPhone'] == $_COOKIE['userPhone']) {
					echo " <input type=\"submit\" class=\"btn btn-success\" value=\"评价接受人\">";
					
				} else{
					if ($completeAss == "") {
						# code...
						echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">等待对接受人评价</button>";
					}else{
					echo "<button type=\"button\" class=\"btn btn-lg btn-primary\" disabled=\"disabled\">您已完成对接受人的评价</button>";
					}
				}

				?>
       
        <input type="reset" class="btn btn-success" value="重置">
        </form>



		</div>
    </div>

</body>
</html>