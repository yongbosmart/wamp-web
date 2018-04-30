
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
            margin: 70px 0px 5px 0px;
        }
        .rightcontent{
            float:right;
            width: 1120px;
            height: 580px;
            overflow: auto;
            padding:45px 10px 10px 5px;
            margin:70px 0px 0px 0px;
            background-color:#EDEDEF;

        }
        a {
            font-size: 9pt;	text-decoration: none;	color: #4C94C1;
        }
        .a1{
            font-size: 9pt;	text-decoration: none;	color: #000000;
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
    <div class="panel panel-default  col-xs-11 col-md-offset-2 " style="margin:10px 10px 10px 40px;margin-bottom:10px;border-radius:6px;padding: 40px 15px 50px 15px;overflow: auto;">


        <?php error_reporting(E_ALL^E_NOTICE^E_WARNING);
        if($_SESSION['error']!=null)
        {echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo $_SESSION['error'];echo ("</div>");$_SESSION['error']=null;}
        if($_SESSION['success']!=null)
        {echo ("<div class=\"alert alert-success col-xs-offset-1\" role=\"alert\">");echo $_SESSION['success'];echo ("</div>");}
        $_SESSION['success']=null;?>
        <?php

        $sign=$admindb->ExecSQL
        ("select distinct(sign1) from blogtext ");


        if(!$sign){
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo "暂无标签";echo ("</div>");
        }else{

            while($array=mysql_fetch_array($sign)){ ?>

                <table class="table table-hover table-condensed table-borderd " style="margin-top:55px;margin-right: 50px">
                    <thead>
                    <tr height=40px align='center'>
                        <td bgcolor="#CDE7C2" colspan=5 align=center><font face="微软雅黑" size=3 ><b><?php echo $array[0];?></b></font></td>
                    </tr>
                    </thead>
                    <tbody style="width:500px">
                    <tr height=35px align='center'>
                        <td align=center><font face="宋体" size=3 color="#555555"><b>文章</b></font></td>
                        <td align=center><font face="宋体" size=3  color="#555555"><b>发布日期</b></font></td>
                        <td align=center><font face="宋体" size=3 color="#555555"><b>发布时间</b></font></td>

                    </tr>
                    <?php
                    $array1=$admindb->ExecSQL
                    ("select texttitle,subDate,textid ,subtime,sign1 from blogtext where sign1='$array[0]' ");

                    while($text=mysql_fetch_array($array1)) {
                        ?>
                        <tr height=35px align='center'>

                            <td align=center><font face="宋体" size=3 color="#555555">
                                    <a href="read.php?textid=<?php echo "$text[2]";?>"><?php echo "$text[0]"; ?></a>
                                </font></td>
                            <td align=center><font face="宋体" size=3 color="#555555"><b>
                                        <?php echo $text[1]; ?>
                                    </b></font></td>
                            <td align=center><font face="宋体" size=3 color="#555555"><b>
                                        <?php echo $text[3]; ?>
                                    </b></font></td>

                        </tr>

                    <?php }?>


                    </tbody>
                </table>
                <?php

            }
        }?>

        <?php error_reporting(E_ALL^E_NOTICE^E_WARNING); if($_SESSION['error']!=null)
        {echo ("<div class=\"alert alert-danger col-xs-offset-1\" role=\"alert\">");echo $_SESSION['error'];echo ("</div>");$_SESSION['error']=null;}
        if($_SESSION['success']!=null)
        {echo ("<div class=\"alert alert-success col-xs-offset-1\" role=\"alert\">");echo $_SESSION['success'];echo ("</div>");}
        $_SESSION['success']=null;?>
    </div>
</div>

<script>
    function change() {
        var divDisp = document.getElementById("search").style.display;
        if (divDisp == "block") {
            document.getElementById("search").style.display = "none";
        } else {
            document.getElementById("search").style.display = "block";
        }
    }
</script>




<div id="search" style="display:none">
    <input id="searchText" type="text" />
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
