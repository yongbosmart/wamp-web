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
<style type="text/css">
    .toolbar {
        border: 1px solid #ccc;
    }
    .text {
        border: 1px solid #ccc;
        height: 200px;

    }
</style>
<body style="background-color: #EDEDEF">


<canvas height=100% width=100% style="position: fixed; top: 0px; left: 0px; z-index: -1; opacity: 0.5;" id="c_n1"></canvas>
<script language="JavaScript" src="js/bgxian.js">
</script>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header" style="margin: 0px 30px 3px 2px">

            <h3 style="font-family:'Kunstler Script'"><a href="homepage.php"><img src="img/blogease1.png" style="margin: -1px 15px 5px 5px"></a><strong>My Blog</strong></h3>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="float: left">
                <li><h3 style="font-family: '微软雅黑 Light'">阅读文章</h3></a> </li>

            </ul>

        </div>
    </div>

</nav>

<div class="panel panel-default  col-xs-8 col-md-offset-2 " style="margin-top:100px;margin-bottom:10px;border-radius:6px;padding: 40px 15px 50px 15px;overflow: auto;">
    <form class="panel-body">

        <form class="panel-body">

            <form class="">
                &nbsp;&nbsp;&nbsp;              <?php
                $id=$_GET['textid'];
                if($_SESSION['textid']!=null){
                    $id=$_SESSION['textid'];
                    $_SESSION['textid']=null;
                }
                if(isset($_GET['textid'])){
                    $id=$_GET['textid'];
                }
                $sign=$admindb->ExecSQL("select texttitle,texthtml from blogtext where textid='$id' ORDER by SUBDATE desc");
                $array=mysql_fetch_array($sign)
                //                            if($_SESSION['error']!=null)
                //                            {echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo $_SESSION['error'];echo ("</div>");$_SESSION['error']=null;}
                //        if($_SESSION['success']!=null)
                //        {echo ("<div class=\"alert alert-success col-xs-offset-1\" role=\"alert\">");echo $_SESSION['success'];echo ("</div>");}
                //        $_SESSION['success']=null;

                //                                $_SESSION['success']="消息上传成功";
                //
                ?>
                <table  border=5  bordercolor="#9FA153" align=center>
                    <tr height="55"   align="center">
                        <td width="700" colspan=8 align="center">
                            <font face=黑体 size=6><?PHP echo $array[0];?></font>
                        </td>
                    </tr>
                    <tr height="50"   align="left">
                        <td width=110 align=center colspan="8"
                            style=" text-align:left; padding:40px 20px" ><font face=等线 color="black" size=4 >
                                <?PHP echo $array[1];?>
                            </font>
                        </td>
                    </tr>

            </table>
        </form>
    </form>
</div>

</div>

<div class="panel panel-default  col-xs-8 col-md-offset-2 " style="margin-top:10px;margin-bottom:100px;border-radius:6px;padding: 40px 15px 50px 15px;">
    <div class="panel-body">
        <?php error_reporting(E_ALL^E_NOTICE^E_WARNING); if($_SESSION['error']!=null)
        {echo ("<div class=\"alert alert-danger\" role=\"alert\">");echo $_SESSION['error'];
            echo ("</div>");$_SESSION['error']=null;}
        if($_SESSION['success']!=null)
        {echo ("<div class=\"alert alert-success\" role=\"alert\">");echo $_SESSION['success'];
            echo ("</div>");}$_SESSION['success']=null;?>
        <form class="form-horizontal col-xs-offset-1" action="comment.php" method="post" name="comm" id="comm">
            <fieldset>
                <legend>发表评论</legend>

                <!--<div class="control-group">-->
                <!--<label class="control-label" for="fileInput">文件上传</label>-->
                <!--<div class="controls">-->
                <!--<input class="input-file" id="fileInput" type="file">-->
                <!--</div>-->
                <!--</div>-->
                <input type="hidden" name="HTML" id="chtml" >
                <input type="hidden" name="textid" value=<?PHP echo $id?> >
                <div class="control-group">
                    <label class="control-label" for="textarea">用户名</label>
                    <div class="controls">
                        <textarea class="input-xlarge " name="name" style="width: 750px" id="textarea" rows="1"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea">评论内容</label>
                    <div id="div1" class="toolbar">
                    </div>
                    <div id="div2" class="text">
                        <p>请输入正文</p>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-default" onclick="fabiao()">发表</button>

                </div>
                <div><br><br></div>
                <legend>评论内容</legend>
                <?PHP
                $result=$admindb->ExecSQL("select comhtml,comname,subdate from textcomment where textid='$id'");

                if(!$result){
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo "暂无评论";echo ("</div>");
                }else{

                    while($arraytmp=mysql_fetch_array($result)){?>
                        <table  border=2  bordercolor="#9FA153" align=center style="margin-left: -10px">
                            <tr height=35  align='center'>
                                <td width=700 colspan=4 align=center style="text-align: left;padding:5px 5px"
                                ><font face=微软雅黑 size=3 ><b>游客：<?PHP echo $arraytmp[1]?>
                                        </b></font></td>
                                <td width=700 colspan=4 align=center style="text-align: left;padding:5px 5px"
                                ><font face=微软雅黑 size=3 >时间：<?PHP echo $arraytmp[2]?>
                                    </font></td>
                            </tr>
                            <tr height="30"   align="left">
                                <td width="700" colspan=8 align="center" style=" text-align:left; padding:10px 5px" >
                                    <font face=微软雅黑 size=3><?PHP echo $arraytmp[0]?></td></tr>
                        </table>
                        <br>
                        <?php

                    }
                }?>
            </fieldset>
        </form>

    </div>
</div>
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
    editor1.create()
    function fabiao() {
        var html=editor1.txt.html();
        document.getElementById("chtml").value=html;
        document.getElementById("comm").submit();
//        alert("sad")

    }
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>