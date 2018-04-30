<?php

/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/12/21
 * Time: 18:33
 */
class AdminDB
{
    function ExecSQL($sqlstr){//定义方法，参数为SQL语句和连接数据库返回的对象

        $sqltype=strtolower(substr(trim($sqlstr),0,6));//截取SQL中前6个字符，并转换成小写
        $rs=mysql_query($sqlstr);//执行SQL语句
$tmp="";
        if($sqltype=="select"){

//            $array=mysql_fetch_array($rs);//获得select结果
//            count($array)==0
            if($rs==false){
                $_SESSION['error']="获取数据失败";
                return false;//如果查询结果为0或执行失败，返回false。
            }else{

                return $rs;}

        }elseif ($sqltype=="update"||$sqltype=="insert"||$sqltype=="delete"){
            //如果不是select
            if($rs)
                return true;//success
            else
                return false;
        }


    }


}