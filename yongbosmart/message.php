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

            <h3 style="font-family:'Bradley Hand ITC'"><a href="homepage.php"><img src="img/blogease1.png" style="margin: -1px 15px 5px 5px"><a></a><strong>YONGBOSMART'S   Blog</strong></h3>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="float: left">
                <li><h3 style="font-family: '微软雅黑 Light'">发送私信</h3></a> </li>

            </ul>

        </div>
    </div>

</nav>

<div class="panel panel-default  col-xs-6 col-md-offset-3 " style="margin-top:100px;margin-bottom:10px;border-radius:6px;padding: 20px 20px 40px 20px;height:450px;overflow: auto;">
    <form class=" panel-body" role="form"  id="mess" name="mess" action="dealmes.php" method="post">
        <legend><h3 style="margin-bottom: -25px">写私信给yongbosmart</h3><h4 align="right"><small>字数不超过500字</small></h4></legend>
        <p> </p>

        <form  action="dealmes.php" method="post" >
            <!--这是你的表单-->
            <input type="text" class="form-control"  name="youname"
                   placeholder="请输入您的姓名">
            <br>
            <textarea class="col-xs-12   input-xxlarge " placeholder="请输入内容" name="youmes" rows="9"></textarea>

        </form>
    </form>

        <br>
    <button type="button" class="btn btn-default " style="margin-right:15px;margin-left:5px;float:right" onclick="quxiao()">取消</button>
    <button type="button" class="btn btn-success " style="float:right" form="mess" name="submit1" onclick="mycheck()">完成</button>

    <br>
    <br>
    <br>
    <script type="text/javascript">
        function mycheck() {
            if(mess.youname.value==""){
                alert("姓名为空，请重新输入")
//            return false;
            }
            if(mess.youmes.value==""){
                alert("信息为空，请重新输入")
//            return false
            }

            document.getElementById("mess").submit();
//        return true;

        }
        function quxiao() {
            window.location.href="homepage.php";
        }
    </script>
    <?php error_reporting(E_ALL^E_NOTICE^E_WARNING); if($_SESSION['error']!=null)
    {echo ("<div class=\"alert alert-danger\" role=\"alert\">");echo $_SESSION['error'];echo ("</div>");$_SESSION['error']=null;}
     if($_SESSION['success']!=null)
    {echo ("<div class=\"alert alert-success\" role=\"alert\">");echo $_SESSION['success'];echo ("</div>");}
    $_SESSION['success']=null;?>
</div>




<div id="footer" class="container">
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="navbar-inner navbar-content-center " style="padding: 5px;">
            <center><font color="#555555">@yongbosmart</font></center>
        </div>
    </nav>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>