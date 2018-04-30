<?php
/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/12/22
 * Time: 17:29
 */
header("Content-Type: text/html; charset=utf-8");

include_once('conn.php');//链接数据库
session_start();



if(isset($_POST['textid'])) {
//    $sign2= $_POST['tag2'];
//    $sign3 = $_POST['tag3'];
    $tcomhtml = $_POST['HTML'];//post获得用户密码单值'
    $textname = $_POST['name'];
    $id= $_POST['textid'];
    $_SESSION['textid']=$id;
    if ($admindb->ExecSQL("insert into textcomment(comhtml, comname,subdate,textid) 
values('$tcomhtml','$textname',now(),'$id')")
    ) {
        $_SESSION['success'] = "评论发表成功";
        header('location: read2.php');
    } else {
        $_SESSION['error'] = "评论发表失败";
        header('location: read2.php');
    }
}