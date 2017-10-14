<?php 
 ?>
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
			
			<h4 class="h4 lead text-center">修改个人信息</h4>
			<form action="mod.php" method="post" >
			  <div class="form-group">
          <label for="phone">手机号</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
         </div>
        <div class="form-group">
          <label for="missionContent">姓名</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </div>

        <input type="submit" class="btn btn-success" value="修改">
        <input type="reset" class="btn btn-success" value="重置">

			</form>
		</div>
    </div>
</body>
</html>