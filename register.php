<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="./dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./dist/css/jumbotron.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="login.html">任务辣么多</a>
        </div>
      </div>
    </nav>
    <div class="jumbotron">

      <div class="container">

	<?php 
		$link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
		if (!$link) {
			# code...
			echo "<h4 class='h4'>数据库连接失败</h4>";
		}
		//else{
		// 	echo "数据库连接成功";
		// }
		//连接成功
		$phone = $_POST['phonenum'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$status = '正常';

		$sql1 = "SELECT * FROM usertable WHERE phoneNum='{$phone}'";
		$result1 = mysqli_query($link, $sql1);

		if (!$result1) {
		echo "SQL执行错误".$sql1;
		}
		if (mysqli_num_rows($result1)) {
			echo "<h4 class='h4 text-center'>{$phone}已经被使用，<a href='registe.html'>点击</a>重新输入</h4>";
		}else{

			$sql = "INSERT INTO usertable (phoneNum, password, name, status) VALUES ('{$phone}', '{$password}', '{$name}', '{$status}' )";

			$result = mysqli_query($link, $sql);

			if (!$result) {
				# code...
				var_dump($_POST);
				var_dump(mysqli_error($link));
				echo "<h4 class='h4 text-center'>注册失败, 请<a href='registe.html'>点击</a>重试 </h4>" .$sql;
			}else{
				echo "<h4 class='h4 text-center'>恭喜, 用户[{$name}]注册成功 手机号为{$phone}
				请<a href='login.html'>点击</a>登陆</h4>";
			}
		}

	 ?>

	 </div>
    </div>
</body>
</html>