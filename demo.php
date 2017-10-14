
<!DOCTYPE html>
<html lang="zh-CN">
<?php 
  $link = mysqli_connect('localhost' ,'root' , '','mission_somuch');
    if (!$link) {
      # code...
      echo "<h4 class='h4'>数据库连接失败</h4>";
    }
    $sql = "SELECT * FROM mission ORDER BY pubDate DESC";
    $result = mysqli_query($link, $sql);
    if(!$result) die("<h4 class='h4'>查询失败</h4>".$sql);

    $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $Date = date('Y-m-d H:i:s',time());
 ?>
  <head>
    <meta charset="utf-8">
    <title>任务辣么多</title>


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
                echo "<a class='btn btn-warning' href='login.html'>退 出</a>";
                // setcookie('login',2,time()-60);
                // setcookie('userPhone', $_COOKIE['userPhone'], time()-60);
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
        <h1>接受或发布一个任务</h1>
        <p></p>
        <p><a class="btn btn-primary btn-lg" href="pubmission.html" role="button">发布任务 &raquo;</a></p>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <div class="col-md-12"> 

            <table class="table table-hover">
              <thead>
                <tr>
                  <td class="info"><h5>任务名称</h5></td>
                  <td class="info"><h5>标签</h5></td>
                  <td class="info"><h5>发布时间</h5></td>
                  <td class="info"><h5>发布人手机号</h5></td>
                  <td class="info"></td>
                </tr>
              </thead>
              <tbody>
              <?php   

                   do{
                    # code...
                    //var_dump($rows);
                    if ($rows['missionSta'] == '未被接受'){
                      echo "<tr>";
                      echo "<td class='active'>{$rows['missionName']}</td>";
                      echo "<td class='active'>{$rows['tab']}</td>";
                      echo "<td class='active'>{$rows['pubDate']}</td>";
                      echo "<td class='active'>{$rows['pubPhone']}</td>";
                      echo "<td class='active'><a href=\"missionCon.php?missionID={$rows['missionID']}\" 
                            class=\"label label-danger\">查看详情</a></td>";
                      echo "</tr>";
                    }}while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
                    
                  
                

               ?>

              </tbody>
              </table>
          </div>
        </div>
      </div>

      <hr>

    </div> 

  </body>
</html>
