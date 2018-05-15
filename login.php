<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>

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
<?php
/**
 * Created by PhpStorm.
 * User: mechrevo
 * Date: 2018/4/25
 * Time: 20:43
 */
session_start();
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$type=$_SESSION['type'];
echo <<<EOF
       <div class="row">
    <div class="col-md-3 col-md-offset-4" style="margin-top: 10%">
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
      </div>
</div>
EOF;

if (isset($_COOKIE["username"]))
    echo "欢迎 " . $_COOKIE["username"] . "!<br>";
else
    echo "普通访客!<br>";
?>
</body>
</html>
