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
		  <li role="presentation"><a href="notRec.php">未被接受任务</a></li>
		  <li role="presentation"><a href="hasRec.php">已被接受任务</a></li>
		  <li role="presentation"><a href="rec.php">已接受任务</a></li>
		  <li role="presentation" class="active"><a href="com.php" >已完成任务</a></li>
		</ul>
		<table class="table table-striped">
              <thead>
                <tr>
                  <td class="info"><h5>任务名称</h5></td>
                  <td class="info"><h5>标签</h5></td>
                  <td class="info"><h5>发布时间</h5></td>
                  <td class="info"></td>
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
					// $sql_pubuser = "SELECT * FROM usertable WHERE phoneNum = {$_COOKIE['userPhone']}";
					// $result_pubuser = mysqli_query($link, $sql_pubuser);
					// if(!$result_pubuser) die("<h4 class='h4'>查询失败</h4>".$sql_pubuser);
					// $rows_pubuser = mysqli_fetch_array($result_pubuser, MYSQLI_ASSOC);
					
					// $userPhone = $rows_pubuser['phoneNum'];
					//$userName = $rows_pubuser['name'];
					//var_dump($rows_pubuser);

				    $sql = "SELECT * FROM mission";
				    $result = mysqli_query($link, $sql);
				    if(!$result) die("<h4 class='h4'>查询失败</h4>".$sql);

				    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);

				    if ($_COOKIE['userPhone'] == $rows['pubPhone']) {

						$sql_pub = "SELECT * FROM mission WHERE pubPhone={$_COOKIE['userPhone']} AND missionSta = '已完成'";
					    $result_pub = mysqli_query($link, $sql_pub);
					    if(!$result_pub) die("<h4 class='h4'>查询失败</h4>".$sql);

				    	while ($rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC ) 
				    	 ) {
		                      echo "<tr>";
		                      echo "<td class='active'>{$rows_pub['missionName']}</td>";
		                      echo "<td class='active'>{$rows_pub['tab']}</td>";
		                      echo "<td class='active'>{$rows_pub['pubDate']}</td>";
		                      //echo "<td class='active'>{$rows['pubPhone']}</td>";
		                      echo "<td class='active'><a href=\"missionCon.php?missionID={$rows_pub['missionID']}\" 
		                            class=\"label label-danger\">查看详情</a></td>";
		                      echo "<td class='active'><a href=\"missionAss.php?missionID={$rows_pub['missionID']}\" 
		                            class=\"label label-danger\">评 价</a></td>";
		                      echo "</tr>";
	                  //  }
		                  }
				    }else{

				    	 $sql_rec = "SELECT * FROM mission WHERE recPhone={$_COOKIE['userPhone']} AND missionSta = '已完成'";
					    $result_rec = mysqli_query($link, $sql_rec);
					    if(!$result_rec) die("<h4 class='h4'>查询失败</h4>".$sql);
					    while ($rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC)){

	                      echo "<tr>";
	                      echo "<td class='active'>{$rows_rec['missionName']}</td>";
	                      echo "<td class='active'>{$rows_rec['tab']}</td>";
	                      echo "<td class='active'>{$rows_rec['pubDate']}</td>";
	                      //echo "<td class='active'>{$rows['pubPhone']}</td>";
	                      echo "<td class='active'><a href=\"missionCon.php?missionID={$rows_rec['missionID']}\" 
	                            class=\"label label-danger\">查看详情</a></td>";
	                      echo "<td class='active'><a href=\"missionAss.php?missionID={$rows_rec['missionID']}\" 
	                            class=\"label label-danger\">评 价</a></td>";
	                      echo "</tr>";


	                  }


				    }

					

				   

				   //  $rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC);
				   //   $rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC);

				   //  var_dump($rows_pub);

							// $rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC);
				   //   switch ($_COOKIE['userPhone']) {
				     	

				   //  		if ($rows_pub['pubPhone'] == $_COOKIE['userPhone']) {
				   //  	# code...
				    
	                 
	      //               # code...
	      //               var_dump($rows);
	      //               if ($rows_rec['missionSta'] == '已完成'){

				   //   	case '{$rows_pub[\'pubPhone\']}':
				   //   		# code...
				     		
				   //  			while ($rows_pub = mysqli_fetch_array($result_pub,MYSQLI_ASSOC ) 
				   //  	 ) {
		     //                  echo "<tr>";
		     //                  echo "<td class='active'>{$rows_pub['missionName']}</td>";
		     //                  echo "<td class='active'>{$rows_pub['tab']}</td>";
		     //                  echo "<td class='active'>{$rows_pub['pubDate']}</td>";
		     //                  //echo "<td class='active'>{$rows['pubPhone']}</td>";
		     //                  echo "<td class='active'><a href=\"missionCon.php?missionID={$rows_pub['missionID']}\" 
		     //                        class=\"label label-danger\">查看详情</a></td>";
		     //                  echo "<td class='active'><a href=\"missionAss.php?missionID={$rows_pub['missionID']}\" 
		     //                        class=\"label label-danger\">评 价</a></td>";
		     //                  echo "</tr>";
	      //              }
		     //              }break;
	                    
	      //             case '{$rows_rec[\'recPhone\']}':

	      //             if ($rows_rec['recPhone'] == $_COOKIE['userPhone']) {
	      //             	# code...

	      //            	 while ($rows_rec = mysqli_fetch_array($result_rec,MYSQLI_ASSOC)){

	      //                 echo "<tr>";
	      //                 echo "<td class='active'>{$rows_rec['missionName']}</td>";
	      //                 echo "<td class='active'>{$rows_rec['tab']}</td>";
	      //                 echo "<td class='active'>{$rows_rec['pubDate']}</td>";
	      //                 //echo "<td class='active'>{$rows['pubPhone']}</td>";
	      //                 echo "<td class='active'><a href=\"missionCon.php?missionID={$rows_rec['missionID']}\" 
	      //                       class=\"label label-danger\">查看详情</a></td>";
	      //                 echo "<td class='active'><a href=\"missionAss.php?missionID={$rows_rec['missionID']}\" 
	      //                       class=\"label label-danger\">评 价</a></td>";
	      //                 echo "</tr>";


	      //             }break;
	              
	      //         }

			}
			?>
			</tbody>
         </table>
			

		</div>
    </div>

</body>
</html>