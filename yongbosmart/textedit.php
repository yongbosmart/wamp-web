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
    <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>yongbosmart</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
    <!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->

    <style type="text/css">
        .toolbar {
            border: 1px solid #ccc;
        }
        .text {
            border: 1px solid #ccc;
            height: 600px;
        }
    </style>
</head>
<body style="background-color: #EDEDEF">
<canvas height=100% width=100% style="position: fixed; top: 0px; left: 0px; z-index: -1; opacity: 0.5;" id="c_n1"></canvas>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header" style="margin: 0px 30px 3px 2px">

            <h3 style="font-family:'Kunstler Script'"><a href="index.php"><img src="img/blogease1.png" style="margin: -1px 15px 5px 5px"></a><strong>My Blog</strong></h3>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="float: left">
                <li><h3 style="font-family: '微软雅黑 Light'">写新文章</h3></a> </li>

            </ul>
        </div>
    </div>

</nav>
<form action="edit.php" method="post" name="wwte" id="wwte" role="form">
<div class="panel panel-default  col-xs-8 col-md-offset-2 " style="margin-top:100px;margin-bottom:10px;border-radius:6px;padding: 40px 15px 50px 15px;overflow: auto;">
    <form class="panel-body">

        <form class="" >
            <input type="text" class="form-control"  name="articletitle"
                   placeholder="请输入文章题目" id="texttitle" >
            <div style="padding: 6px 0; color: #ccc"></div>
            <div id="div1" class="toolbar">
            </div>
            <div id="div2" class="text">

                <p>请输入文字</p>
            </div></form>
            <input type="hidden" name="HTML" id="whtml" >
            <input type="hidden" name="text" id="wtext">
        <input type="hidden" name="tag1" id="tag1" >
        <input type="hidden" name="tag2" id="tag2">
        <input type="hidden" name="tag3" id="tag3" >





    </form>
    </div>



<div class="panel panel-default  col-xs-8 col-md-offset-2 " style="margin-top:10px;margin-bottom:100px;border-radius:6px;padding: 40px 15px 50px 15px;">
    <div class="panel-body">
    <form class="form-horizontal" >
        <fieldset>

            <div class="control-group">
                <label class="control-label" for="texttag">Tag</label>
                <div class="controls">
                    <input type="text" class="form-control"
                           placeholder="请输入标签" id="texttag" name="texttag" >

                </div>
                <p class="help-block">（最多添加3个标签，多个标签之间用“，”（中文逗号）分隔）</p>
            </div>

            <div class="form-actions">
<!--                <button type="button" class="btn btn-default" name="submit1" onclick="getcontent()">保存修改</button>-->
                <button type="button" class="btn btn-default" name="submit2" onclick="fabiao()">发表文章</button>
            </div>
        </fieldset>
        <?php error_reporting(E_ALL^E_NOTICE^E_WARNING); if($_SESSION['error']!=null)
        {echo ("<div class=\"alert alert-danger\" role=\"alert\">");echo $_SESSION['error'];
        echo ("</div>");$_SESSION['error']=null;}
        if($_SESSION['success']!=null)
        {echo ("<div class=\"alert alert-success\" role=\"alert\">");echo $_SESSION['success'];
        echo ("</div>");}$_SESSION['success']=null;?>
    </form>

    </div>
</div>




</form>

<div id="footer" class="container">
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="navbar-inner navbar-content-center " style="padding: 5px;">
            <center><font color="#555555">@yongbosmart</font></center>
        </div>
    </nav>
</div>
<script type="text/javascript" src="js/wangEditor.min.js"></script>

<script type="text/javascript">
    var E = window.wangEditor
    var editor1 = new E('#div1', '#div2')  // 两个参数也可以传入 elem 对象，class 选择器

    editor1.create();



</script>

<script type="text/javascript">

    function fabiao() {
        var html=editor1.txt.html();
        var text=editor1.txt.text();
        var tag=document.getElementById("texttag").value;
        document.getElementById("tag1").value=tag;
        document.getElementById("whtml").value=html;
        document.getElementById("wtext").value=text;
        document.getElementById("wwte").submit();
//        alert("sad")

    }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>