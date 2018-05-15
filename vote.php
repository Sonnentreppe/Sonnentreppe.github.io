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
            <li role="presentation" ><a href="index.php">第一次作业</a></li>
            <li role="presentation"><a href="image.php">第二次作业</a></li>
            <li role="presentation" class="active"><a href="vote.php">第三次作业</a></li>
            <li role="presentation"><a href="sql.php">第四次作业</a></li>
        </ul>
<?php
session_start();
$filesdir='date.txt';
if(!file_exists($filesdir)){
    fopen($filesdir,'w');
}
$array=explode(" ",file_get_contents($filesdir));
$_SESSION['张三']=$array[0];
$_SESSION['李四']=$array[1];
$_SESSION['王五']=$array[2];
if(isset($_POST['who'])){
    $username=$_POST['who'];
    switch ($username){
        case 0:
            $_SESSION['张三']+=1;
            break;
        case 1:
            $_SESSION['李四']+=1;
            break;
        case 2:
            $_SESSION['王五']+=1;
            break;
    }
    $zangsan=$_SESSION['张三'];
    $lisii=$_SESSION['李四'];
    $wangwu=$_SESSION['王五'];
    $result=array("张三"=>$zangsan,"李四"=>$lisii,"王五"=>$wangwu);
    file_put_contents($filesdir,implode(" ",$result));
    echo <<<EOF
    <h3>投票结果</h3>
    <table class="table table-striped" >
          <tr>
            <th>姓名</th>
            <th>票数</th>
          </tr>
          <tr>
            <td>张三</td>
            <td>$zangsan</td>
         </tr>
           <tr>
            <td>李四</td>
            <td>$lisii</td>
         </tr>
           <tr>
            <td>王五</td>
            <td>$wangwu</td>
         </tr>
      </table>
EOF;
}
?>
    </div>
<div class="row">
     <form action="" method="post">
     <div class="col-md-3 col-md-offset-4" >
        <div class="panel panel-default">
           <div class="panel-heading"><h3>投票</h3></div>
            <div class="panel-body">
                <div class="input-group">
                    <label class="radio-inline">张三：</label>
                    <input type="radio" name="who" id="inlineRadio1" value="0">
                </div>
                <div class="input-group">
                    <label class="radio-inline">李四： </label>
                    <input type="radio" name="who" id="inlineRadio1" value="1">

                </div>
                <div class="input-group">
                    <label class="radio-inline">王五： </label>
                    <input type="radio" name="who" id="inlineRadio1" value="2">

                </div>
                <div class="col-md-offset-10 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
            </div>
        </div>
     </form>
 </div>
</body>
</html>