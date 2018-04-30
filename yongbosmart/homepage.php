<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
include "conn.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>yongbosmart</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/brief.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <!--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    <!--integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->

    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--[endif]-->

    <style type="text/css">
        .sidebar{
            float:left;
            position: fixed;
            height:800px;
            /*之前下面写的是position：fixed，然后下面的rightcontent写的是float left*/
            background-color:#534F49;
            width: 250px;
            padding:10px;
            margin: 70px 2px 5px 0px;
        }
        .rightcontent{
            float:right;
            width: 1070px;
            height: 580px;
            overflow: auto;
            padding:45px 10px 10px 5px;
            margin:70px 0px 0px 2px;

        }
    </style>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header" style="margin: 0px 30px 3px 2px">

            <h3 style="font-family:'Bradley Hand ITC'"><a href="homepage.php"><img src="img/blogease1.png" style="margin: -1px 15px 5px 5px"></a> <strong>YONGBOSMART'S   Blog</strong></h3>
        </div>

    </div>

</nav>
<div class="sidebar">

    <div class="container" style="padding:10px">
        <table align="center "style="margin:25px 17px">
            <tr>
                <td align="center" colspan="3">
                    <img src="img/head.png" alt="" class="img-circle" style="border:double;border-color:#9FA153;width: 140px;height: 140px">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="6">
                    <h1 style="color: #ffffff;margin: 15px;font-family:'Edwardian Script ITC'" >Yongbosmart</h1></p>
                </td>
            </tr>
        </table>

        <p></p>

        <div class="btn-group-vertical" style="margin:25px 10px 25px 5px">
            <button type="button" class="btn col-md-5" name="" onmouseover="this.style.backgroundColor='#9FA153';"
                    onmouseout="this.style.backgroundColor='#64605B';" onclick="location='message.php'" style="background-color: #64605B;
        color:#ffffff;margin:10px;border-radius: 15px;height: 30px;width: 170px;">私信</button>
            <button type="button" class="btn col-md-5" name="" onmouseover="this.style.backgroundColor='#9FA153';"
                    onmouseout="this.style.backgroundColor='#64605B';" onclick="location='clasif2.php'" style="background-color:#64605B;
        color:#ffffff;margin:10px;border-radius: 15px;height: 30px;width: 170px">分类</button>
            <button type="button" class="btn col-md-5" name="" onmouseover="this.style.backgroundColor='#9FA153';"
                    onmouseout="this.style.backgroundColor='#64605B';" style="background-color:#64605B;
        color:#ffffff;margin:10px;border-radius: 15px;height: 30px;width: 170px">留言</button>
            <button type="button" class="btn col-md-5" name="" onmouseover="this.style.backgroundColor='#9FA153';"
                    onmouseout="this.style.backgroundColor='#64605B';" style="background-color:#64605B;
        color:#ffffff;margin:10px;border-radius: 15px;height: 30px;width: 170px">搜索</button>

        </div>

    </div>

</div>
<div class="rightcontent">
    <?php include_once ("conn.php");
    $myrow=$seppage->ShowDate("select texttitle,textcon,DAY(subDate) as dd,subdate,textid from blogtext ORDER by SUBDATE DESC ,SUBTIME DESC ",4,$_GET["page"]);
    if(!$myrow){
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo "暂无博文";echo ("</div>");
    }else{
        for($i=0;$i<count($myrow[0]);$i++){?>
            <br>

            <div class="panel panel-default col-xs-10 col-xs-offset-1"  >
                <div class="panel-body">
                    <div style="width: 25%;float:left ">
                        <img src="img/<?php echo $myrow[2][$i];?>.png" class="img-rounded " >
                    </div>

                    <div  style="float: left;width: 70%">
                        <b><h3><?php echo $myrow[0][$i];?></h3>

                        </b>
                        <div>
                            <p><h5><?php echo mb_substr($myrow[1][$i],0,50,'utf-8');?></h5></p>

                        </div>
                    </div>


                </div>
                <div class="panel-footer"  >
                    <div style="float: left">
                        <h5 align="left"><?php echo $myrow[3][$i];?></h5>
                    </div>
                    <div style="float: right">
                        <!--                --><?php //echo("<input type=\"hidden\" name=\"textid\" value="+$myrow[4][$i]+">");?>
                        <h5 align="right"><a href= <?php echo "read2.php?textid=".$myrow[4][$i]?>>点击阅读全文 》》</a></h5>
                    </div>
                </div>

            </div>
            <br>
            <?php
        }
    }?>
<?php //error_reporting(E_ALL^E_NOTICE^E_WARNING); if($_SESSION['error']!=null)
//    {echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo $_SESSION['error'];echo ("</div>");$_SESSION['error']=null;}
//if($_SESSION['success']!=null)
//{echo ("<div class=\"alert alert-success col-xs-offset-1\" role=\"alert\">");echo $_SESSION['success'];echo ("</div>");}
//$_SESSION['success']=null;?>

<!--<div class="panel panel-default col-xs-10"  >-->
        <!--<div class="panel-body">-->
            <!--<div style="width: 25%;float:left">-->
                <!--<img src="img/6.png" class="img-rounded " >-->
            <!--</div>-->
            <!--<div style="width: 20%;float: left">-->
                <!--<img src="img/try.jpg" style="border-radius: 8px;width: 120px;height:120px">-->
            <!--</div>-->
            <!--<div  style="float: left;width: 50%">-->

                <!--<div>-->
                    <!--<p>悲歌可以当泣，远望可以当归。-->
                        <!--思念故乡，郁郁累累。-->
                        <!--欲归家无人，欲渡河无船。-->
                        <!--心思不能言，肠中车轮转。-->
                    <!--</p>-->


                <!--</div>-->
            <!--</div>-->


        <!--</div>-->

        <!--<div class="panel-footer"  >-->
            <!--<div style="float: left">-->
                <!--<h5 align="left">2017.11.03</h5>-->
            <!--</div>-->
            <!--<div style="float: right">-->
                <!--&lt;!&ndash;<h5 align="right"><a href="login.htm">点击阅读全文</a></h5>&ndash;&gt;-->
            <!--</div>-->
        <!--</div>-->

    <!--</div>-->
    <!--<div class="panel panel-default col-xs-10"  >-->
        <!--<div class="panel-body">-->
            <!--<div style="width: 25%;float:left;padding: 1px ">-->
                <!--<img src="img/1.png" class="img-rounded " >-->
            <!--</div>-->
            <!--<div style="width: 20%;float: left">-->
                <!--<img src="img/try2.jpg" style="border-radius: 2px;width: 120px;height:120px">-->
            <!--</div>-->
            <!--<div  style="float: left;width: 50%">-->
                <!--<b><h3>关于js的使用建议</h3>-->

                <!--</b>-->
                <!--<div>-->
                    <!--<p>似花，非花，花是花，这些覆过眉的花瓣，一曲《葬花吟》多少断肠人，埋葬了花的泪眼。而那冰洁如玉的梨花，片片也曾在岁月中将大漠的与关山的黄沙覆没。当带着泪的海棠啼血，-->
                        <!--正好煮沸一个人寂寞了许久的心跳。</p>-->

                <!--</div>-->
            <!--</div>-->


        <!--</div>-->

        <!--<div class="panel-footer"  >-->
            <!--<div style="float: left">-->
                <!--<h5 align="left">2017.11.03</h5>-->
            <!--</div>-->
            <!--<div style="float: right">-->
                <!--<h5 align="right"><a href="read.html">点击阅读全文》》</a></h5>-->
            <!--</div>-->
        <!--</div>-->

    <!--</div>-->
    <!--<br>-->
    <!--<div class="panel panel-default col-xs-10"  >-->
        <!--<div class="panel-body">-->
            <!--<div style="width: 25%;float:left ">-->
                <!--<img src="img/4.png" class="img-rounded " >-->
            <!--</div>-->

            <!--<div  style="float: left;width: 70%">-->
                <!--<b><h3>关于js的使用建议</h3>-->

                <!--</b>-->
                <!--<div>-->
                    <!--<p>似花，非花，花是花，这些覆过眉的花瓣，一曲《葬花吟》多少断肠人，埋葬了花的泪眼。而那冰洁如玉的梨花，片片也曾在岁月中将大漠的与关山的黄沙覆没。当带着泪的海棠啼血，-->
                        <!--正好煮沸一个人寂寞了许久的心跳。</p>-->

                <!--</div>-->
            <!--</div>-->


        <!--</div>-->
        <!--<div class="panel-footer"  >-->
            <!--<div style="float: left">-->
                <!--<h5 align="left">2017.11.03</h5>-->
            <!--</div>-->
            <!--<div style="float: right">-->
                <!--<h5 align="right"><a href="login.htm">点击阅读全文 》》</a></h5>-->
            <!--</div>-->
        <!--</div>-->

    <!--</div>-->

    <!--<div class="panel panel-default col-xs-10"  >-->
        <!--<div class="panel-body">-->
            <!--<div style="width: 25%;float:left ">-->
                <!--<img src="img/3.png" class="img-rounded " >-->
            <!--</div>-->

            <!--<div  style="padding: 1px;float: left;width: 70%">-->
                <!--<b><h3>关于js的使用建议</h3>-->

                <!--</b>-->
                <!--<div>-->
                    <!--<p>似花，非花，花是花，这些覆过眉的花瓣，一曲《葬花吟》多少断肠人，埋葬了花的泪眼。而那冰洁如玉的梨花，片片也曾在岁月中将大漠的与关山的黄沙覆没。当带着泪的海棠啼血，-->
                        <!--正好煮沸一个人寂寞了许久的心跳。</p>-->


                <!--</div>-->
            <!--</div>-->


        <!--</div>-->

        <!--<div class="panel-footer"  >-->
            <!--<div style="float: left">-->
                <!--<h5 align="left">2017.11.03</h5>-->
            <!--</div>-->
            <!--<div style="float: right">-->
                <!--<h5 align="right"><a href="login.htm">点击阅读全文 》》</a></h5>-->
            <!--</div>-->
        <!--</div>-->

    <!--</div>-->

    <!--<ul class="pagination">-->
        <!--<li><a href="#">«</a></li>-->
        <!--<li><a href="#">1</a></li>-->
        <!--<li><a class="active" href="#">2</a></li>-->
        <!--<li><a href="#">3</a></li>-->
        <!--<li><a href="#">4</a></li>-->
        <!--<li><a href="#">5</a></li>-->
        <!--<li><a href="#">6</a></li>-->
        <!--<li><a href="#">7</a></li>-->
        <!--<li><a href="#">»</a></li>-->
    <!--</ul>-->

</div>
<table width="550" border="0" callspacing="0" cellpadding="0"  class="col-xs-offset-3">
    <tr>
        <td width="37%"><?php echo  $seppage->ShowPage("博文","条","","a1");?></td>
    </tr>
</table>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
