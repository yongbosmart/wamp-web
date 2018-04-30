<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
include "conn.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>yongbosmart</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="js/bgxian.js"></script>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/canvas-nest.js/1.0.1/canvas-nest.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--[endif]-->
</head>

<body style="background-color: #EDEDEF">


<canvas height=100% width=100% style="position: fixed; top: 0px; left: 0px; z-index: -1; opacity: 0.5;" id="c_n1"></canvas>
<script language="JavaScript" src="js/bgxian.js">
</script>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header" style="margin: 0px 30px 3px 2px">

            <h3 style="font-family:'Kunstler Script'"><a href="index.php"><img src="img/blogease1.png" style="margin: -1px 15px 5px 5px"></a><strong>My Blog</strong></h3>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="float: left">
                <li><h3 style="font-family: '微软雅黑 Light'">阅读私信</h3></a> </li>

            </ul>

        </div>
    </div>

</nav>
<div style="margin-top: 100px"></div>
<?php include_once ("conn.php");
$myrow=$sepmes->ShowDate("select mesdate,mestext,mesname,DAY(mesdate) as dd from message ORDER by mesdate DESC ",4,$_GET["page"]);
if(!$myrow){
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo "暂无私信";echo ("</div>");
}
else{
    for($i=0;$i<count($myrow[0]);$i++){?>
        <div class="panel panel-default col-xs-5 " style="margin: 5px 25px 5px 35px;"   >
            <div class="panel-body">
                <div style="width: 25%;float:left;padding: 1px;">
                    <img src="img/<?php echo $myrow[3][$i];?>.png" class="img-rounded " >
                </div>

                <div  style="float: left;width: 70%">
                    <div class="panel panel-success col-xs-12" style="overflow: auto;height:170px;overflow: auto;"><div class="panel-body">
                            <font face=等线 size=3><p><?PHP echo $myrow[1][$i];?></p>
                            </font></div> </div>
                    <div>
                 </div>
                </div>


            </div>

            <div class="panel-footer"  >
                <div style="float: left">
                    <h5 align="left"><?PHP echo $myrow[0][$i];?></h5>
                </div>
                <div style="float: right">
                    <h5 align="right">姓名：<?PHP echo $myrow[2][$i];?></h5>
                </div>
            </div>

        </div>
<?php
        if(($i+1)%2==0){
            echo "<br>";
        }
        ?>
    <?php
    }
}
?>




</div>
<div id="footer" class="container">
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="navbar-inner navbar-content-center " style="padding: 5px;">
            <center><font color="#555555">@yongbosmart</font></center>
        </div>
    </nav>
</div>
<table width="550" border="0" callspacing="0" cellpadding="0"  class="col-xs-offset-3">
    <tr>
        <td width="37%"><?php echo  $sepmes->ShowPage("博文","条","","");?></td>
    </tr>
</table>
<div style="margin-top: 100px"> </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>