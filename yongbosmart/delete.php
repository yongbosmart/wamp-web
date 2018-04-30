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

$textid=$_POST["textid"];

if($admindb->ExecSQL("DELETE FROM blogtext WHERE textid = '$textid' ")){
    $_SESSION['success']="删除成功";
    header('location: clasif.php');
}else{
    $_SESSION['error']="删除失败";
    header('location: clasif.php');
}