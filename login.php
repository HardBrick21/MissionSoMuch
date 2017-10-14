
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
          <a class="navbar-brand" href="#">任务辣么多</a>
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

		$phone = $_POST['phonenum'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM usertable WHERE phoneNum='{$phone}' AND password='{$password}'";
		$result = mysqli_query($link, $sql);

		if(!$result) die("数据库查询错误".$sql);

		$rows = mysqli_num_rows($result);

		if ($rows == 1) {

			$user = mysqli_fetch_assoc($result);
			//var_dump($user);
			$userPhone = $user['phoneNum'];

			
			setcookie('login',1,time()+60*30);
			setcookie('userPhone', $userPhone, time()+60*30);
			header("Location:demo.php");
			
		}else{
			echo "<h4 class='h4 text-center'>用户名与密码不匹配，请<a href='login.html'>点击</a>重试 </h4>";
		}

	 ?>

	 </div>
    </div>
</body>
</html>