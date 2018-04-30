<?php
/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/12/21
 * Time: 21:58
 */
error_reporting(E_ALL^E_NOTICE^E_WARNING);
session_start();
include_once ('conn.php');

   $youname=$_POST["youname"];
    $mes=$_POST["youmes"];
    if($admindb->ExecSQL("insert into message(mestext,mesname,mesdate) values('$mes','$youname',now())")){
        $_SESSION['success']="消息上传成功";
        header('location: message.php');
    }else{
        $_SESSION['error']="消息上传失败";
        header('location: message.php');
    }

