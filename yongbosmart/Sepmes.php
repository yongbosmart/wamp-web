<?php
/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/12/22
 * Time: 19:07
 */
class Sepmes
{
    var $rs;
    var $pagesize;					//定义每页显示的记录数
    var $nowpage;					//当前页码
    var $array;

    var $sqlstr;					//执行的SQL语句
    var $total;
    var $pagecount;					//总的记录数
    function ShowDate($sqlstr,$pagesize,$nowpage){	//定义方法
        $arrays=array();
        $array_name=array();
        $array_time=array();
        $array_text=array();
        $array_date=array();

        if(!isset($nowpage) || $nowpage=="" || $nowpage==0)			//判断当前页变量值是否为空
            $this->nowpage=1;						//定义当前页的值
        else
            $this->nowpage=$nowpage;				//获取当前页的值

        $this->pagesize=$pagesize;					//定义每页输出的记录数
        $this->sqlstr=$sqlstr;						//执行的查询语句
//        $this->pagecount=$pagecount;				//总的记录数
//        $this->total=$total;						//总的记录数

        $this->rs=mysql_query($this->sqlstr."limit ".$this->pagesize*($this->nowpage-1).",$this->pagesize");
//        $_SESSION['error']=$this->sqlstr."limit ".$this->pagesize*($this->nowpage-1).",$this->pagesize";
        $this->total=mysql_num_rows($this->rs);			//获取记录数

        if($this->total==0){
            //判断如果查询结果为0，则输出如下内容
            return false;
        }else{								//否则
            if(($this->total % $this->pagesize)==0){			//判断如果总的记录数除以每页显示的记录数等于0
                $this->pagecount=intval($this->total/$this->pagesize);	//则为变量pagecount赋值
            }else if($this->total<=$this->pagesize){
                $this->pagecount=1;//如果查询结果小于等于每页记录数，那么为变量赋值为1
            }else{
                $this->pagecount=ceil($this->total/$this->pagesize);	//否则输出变量值
            }
            while($this->array=mysql_fetch_array($this->rs)){
                array_push($array_time,$this->array[mesdate]);
                array_push($array_text,$this->array[mestext]);
                array_push($array_name,$this->array[mesname]);
                array_push($array_date,$this->array[dd]);

            }
            array_push($arrays,$array_time,$array_text,$array_name,$array_date);
            if($arrays==null){}

            return $arrays;
        }
    }
    function ShowPage($contentname,$utits,$anothersearchstr,$class){
        $allrs=mysql_query($this->sqlstr);		//执行查询语句
        $record=mysql_num_rows($allrs);
        $pagecount=ceil($record/$this->pagesize);		//计算共有几页
        $str="";
        $str.="共有".$contentname."&nbsp;".$record."&nbsp;".$utits."&nbsp;每页显示&nbsp;".$this->pagesize."&nbsp;".$utits."&nbsp;第&nbsp;".$this->nowpage."&nbsp;页/共&nbsp;".$pagecount."&nbsp;页";
        $str.="&nbsp;&nbsp;&nbsp;&nbsp;";
        $str.="<a href=".$_SERVER['PHP_SELF']."?page=1>首页</a>";

        $str.="&nbsp;";
        if(($this->nowpage-1)<=0){
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=1".$anothersearchstr." class=".$class.">上一页</a>";
        }else{
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->nowpage-1).$anothersearchstr." class=".$class.">上一页</a>";
        }
        $str.="&nbsp;";
        if(($this->nowpage+1)>=$pagecount){
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".$pagecount.$anothersearchstr." class=".$class.">下一页</a>";
        }else{
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->nowpage+1).$anothersearchstr." class=".$class.">下一页</a>";
        }
        $str.="&nbsp;";
        $str.="<a href=".$_SERVER['PHP_SELF']."?page=".$pagecount.$anothersearchstr." class=".$class.">尾页</a>";
        if(count($this->array)==0 || $this->rs==false){
            $_SESSION['success']="成功";
            return "";}
        else
            return $str;
    }


}