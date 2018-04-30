<?php
/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/12/19
 * Time: 9:26
 */
header("Content-Type: text/html; charset=utf-8");

include_once('conn.php');//链接数据库
session_start();



if(!isset($_POST['textid'])){
//    $sign2= $_POST['tag2'];
//    $sign3 = $_POST['tag3'];
$textcon= $_POST['text'];//post获得用户密码单值'
$texthtml = $_POST['HTML'];
$sign1= $_POST['tag1'];
    $title = $_POST['articletitle'];
    if($admindb->ExecSQL("insert into blogtext(texttitle, zhiding,texthtml,textcon,subdate,subtime,sign1) 
values('$title',0,'$texthtml','$textcon',curdate(),curtime(),'$sign1')")){
        $_SESSION['success']="发表成功";
        header('location: textedit.php');
    }else{
        $_SESSION['error']="发表失败";
        header('location: textedit.php');
    }

}else{
    $textid=$_POST['textid'];
    $textcon= $_POST['text'];//post获得用户密码单值'
    $texthtml = $_POST['HTML'];
    $sign1= $_POST['tag1'];
    $title = $_POST['articletitle'];
    if($admindb->ExecSQL("UPDATE blogtext SET texthtml = '$texthtml' ,textcon='$textcon',texttitle='$title',sign1='$sign1' WHERE textid = '$textid' ")){
        $_SESSION['success']="更新成功";
        header('location: textedit.php');
    }else{
        $_SESSION['error']="更新失败";
        header('location: textedit.php');
    }
}



