<?php
/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/11/28
 * Time: 2:23
 */
require ("AdminDB.php");
require ("SepPage.php");
require ("Sepmes.php");
    $server="localhost";//主机
    $db_username="root";//你的数据库用户名
    $db_password="";//你的数据库密码
//    $con=mysqli_connect($server,$db_username,$db_password, 'yongbosmart');
    $con = mysql_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect".mysql_error());//如果链接失败输出错误
    }

    mysql_select_db('yongbosmart',$con);//选择数据库（我的是test）
    $admindb=new AdminDB();
    $seppage=new SepPage();
    $sepmes=new Sepmes();
//    $unhtml=new UseFun();
