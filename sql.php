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
            <li role="presentation"><a href="index.php">第一次作业</a></li>
            <li role="presentation"><a href="image.php">第二次作业</a></li>
            <li role="presentation"><a href="vote.php">第三次作业</a></li>
            <li role="presentation" class="active"><a href="sql.php">第四次作业</a></li>
        </ul>
<?php
include("config.php");
$create_table="create table persons (
id int,
name varchar(20),
age int,
PRIMARY KEY (id)
)";
$db=new db;
$db->query($create_table);

$insert1="insert into persons VALUE ('1','wangkaidi','21')";
$insert2="insert into persons VALUE ('2','yuansi','19')";
$db->query($insert1);
$db->query($insert2);

$sql="select * from persons";
$result=$db->query($sql);
$results=array();
//var_dump($result);
while($row = $result->fetch_array(MYSQL_ASSOC)){
    $results[]=$row;
}
foreach ( $results as $put){
?>

<table class="table table-striped" >
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
          </tr>
        </thead>
    <tbody>
          <tr>
            <td><?php echo $put['id'];?></td>
            <td><?php echo $put['name'];?></td>
            <td><?php echo $put['age']; ?></td>
         </tr>
         </tbody>
      </table>
<?php }
$db->close();
?>

 </div>
</body>
</html>