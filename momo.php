<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./dist/css/jumbotron.css" rel="stylesheet">
    <script src="./dist/js/jquery.min.js"></script>
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
			

		</div>
    </div>
	<?php 
		$link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
		// if (!$link) {
		// 	# code...
		// 	echo "数据库连接失败";
		// }else{
		// 	echo "数据库连接成功";
		// }
		//连接成功

	 ?>
</body>
</html>