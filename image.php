<?php
/**
 * Created by PhpStorm.
 * User: mechrevo
 * Date: 2018/5/2
 * Time: 16:23
 */
$image=imagecreatetruecolor(200,200);
$blackcolor=imagecolorallocate($image,255,255,255);
imagefill($image,0,0,$blackcolor);

//定义颜色
$red=imagecolorallocate($image, 255, 0, 0);
$darkred=imagecolorallocate($image, 102, 0, 0);

$blue=imagecolorallocate($image, 0, 0, 255);
$darkblue=imagecolorallocate($image, 0, 51, 102);;


$green=imagecolorallocate($image, 0, 255, 0);
$darkgreen=imagecolorallocate($image, 51, 102, 51);

$gray=imagecolorallocate($image, 125, 125, 125);
$darkgray=imagecolorallocate($image, 102, 102, 102);

$color=imagecolorallocate($image, 200, 125, 10);
$darkcolor=imagecolorallocate($image, 102, 102, 102);

if(isset($_POST['1'])) {
    $anhui = $_POST['1'];
    $jilin = $_POST['2'];
    $beijing = $_POST['3'];
    $zhejiang = $_POST['4'];
    $five = $_POST['5'];

    $count = $anhui + $beijing + $jilin + $zhejiang + $five;

//循环画饼状图
    for ($i = 100; $i > 85; $i--) {
       imagefilledarc($image, 100, $i, 150, 100, 0, ($anhui / $count) * 360, $darkgray, IMG_ARC_PIE);
        imagefilledarc($image, 100, $i, 150, 100, ($anhui / $count) * 360, (($anhui + $jilin) / $count) * 360, $darkblue, IMG_ARC_PIE);
       imagefilledarc($image, 100, $i, 150, 100, (($anhui + $jilin) / $count) * 360, (($anhui + $jilin + $beijing) / $count) * 360, $darkgreen, IMG_ARC_PIE);
        imagefilledarc($image, 100, $i, 150, 100, (($anhui + $jilin + $beijing) / $count) * 360, (($anhui + $jilin + $beijing+$five) / $count) * 360, $darkred, IMG_ARC_PIE);
        imagefilledarc($image, 100, $i, 150, 100, (($anhui + $jilin + $beijing+$five) / $count) * 360, 360, $darkcolor, IMG_ARC_PIE);
    }
    imagefilledarc($image, 100, 85, 150, 100, 0, ($anhui / $count) * 360, $gray, IMG_ARC_PIE);
    imagefilledarc($image, 100, 85, 150, 100, ($anhui / $count) * 360, (($anhui + $jilin) / $count) * 360, $blue, IMG_ARC_PIE);
    imagefilledarc($image, 100, 85, 150, 100, (($anhui + $jilin) / $count) * 360, (($anhui + $jilin + $beijing) / $count) * 360, $green, IMG_ARC_PIE);
    imagefilledarc($image, 100, 85, 150, 100, (($anhui + $jilin + $beijing) / $count) * 360, (($anhui + $jilin + $beijing + $five) / $count) * 360, $red, IMG_ARC_PIE);
    imagefilledarc($image, 100, 85, 150, 100, (($anhui + $jilin + $beijing + $five) / $count) * 360,  360, $color, IMG_ARC_PIE);

   // header("Content-type: image/png");
    //$image = imagecreatefrompng("test.png");
    imagepng($image,"test.png");
    imagedestroy($image);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>image</title>
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
            <li role="presentation" class="active"><a href="image.php">第二次作业</a></li>
            <li role="presentation" ><a href="vote.php">第三次作业</a></li>
            <li role="presentation"><a href="sql.php">第四次作业</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-md-offset-4" style="margin-top: 50px;">
        <div class="panel panel-default">
            <div class="panel-body">
                投资分布扇形图
                <img src="test.png" class="img-responsive" alt="输入数值生成图片">
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-2">安徽：<div style="height: 10px;width: 10px;background-color:gray;"></div></div>
                    <div class="col-xs-2">浙江：<div style="height: 10px;width: 10px;background-color:blue;"></div></div>
                    <div class="col-xs-2">吉林：<div style="height: 10px;width: 10px;background-color:green;"></div></div>
                    <div class="col-xs-2">北京：<div style="height: 10px;width: 10px;background-color:darkgoldenrod;"></div></div>
                    <div class="col-xs-2">武汉：<div style="height: 10px;width: 10px;background-color:red;"></div></div>

                </div>
            </div>
        </div>
    </div>
    <form action="" method="post">
        <div class="col-md-3 col-md-offset-4">
            <h2 style="text-align:center">投资分布统计</h2>
            <div class="panel panel-default" style="text-center">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">安徽：</span>
                    <input type="number" class="form-control"  name="1" placeholder="请输入金额"  aria-describedby="basic-addon3">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">浙江：</span>
                    <input type="number" class="form-control" name="2" placeholder="请输入金额" aria-describedby="basic-addon3">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">吉林：</span>
                    <input type="number" class="form-control" name="3" placeholder="请输入金额" aria-describedby="basic-addon3">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">北京：</span>
                    <input type="number" class="form-control" name="4" placeholder="请输入金额" aria-describedby="basic-addon3">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">武汉：</span>
                    <input type="number" class="form-control" name="5" placeholder="请输入金额" aria-describedby="basic-addon3">
                </div>
                <div class="col-md-offset-10 col-sm-10">
                    <button type="submit" class="btn btn-default">生成饼状图</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>
