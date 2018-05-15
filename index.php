<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>index</title>
    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row" style="width:100%;">
    <div class="col-md-3 col-md-offset-4">
        <ul class="nav nav-tabs" style="margin-top:10px;">
            <li role="presentation" class="active"><a href="index.php">第一次作业</a></li>
            <li role="presentation"><a href="image.php">第二次作业</a></li>
            <li role="presentation"><a href="vote.php">第三次作业</a></li>
            <li role="presentation"><a href="sql.php">第四次作业</a></li>
        </ul>
<?php
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    session_start();
    $_SESSION['username']= $username;
    $_SESSION['password']= $password;
    $_SESSION['type']=$type;
    setcookie("username", $username, time()+3600);
    echo <<<EOF
    <table class="table table-striped" >
        <thead>
          <tr>
            <th>用户名</th>
            <th>密码</th>
            <th>类型</th>
          </tr>
        </thead>
    <tbody>
          <tr>
            <td>$username</td>
            <td>$password</td>
            <td>$type</td>
         </tr>
         </tbody>
      </table>
  <div class="col-md-offset-5 col-sm-10">
        <a href="login.php"><button class="btn btn-default">跳转到其他页面</button></a>
          </div>
EOF;
}
?>
    </div>
     <form action="" method="post">
     <div class="col-md-3 col-md-offset-4" >
        <div class="panel panel-default" style="text-center">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">用户名：</span>
                <input type="text" class="form-control"  name="username" placeholder="请输入用户名"  aria-describedby="basic-addon3">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">密码：</span>
                <input type="password" class="form-control" name="password" placeholder="请输入密码" aria-describedby="basic-addon3">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">类型：</span>
                <select class="form-control" name="type" style="width: 25%;">
                    <option>学生</option>
                    <option>老师</option>
                </select>
            </div>
            <div class="col-md-offset-10 col-sm-10">
            <button type="submit" class="btn btn-default">提交</button>
            </div>
            </div>
        </div>
     </form>
 </div>
</body>
</html>