<?php

/**
 * Created by PhpStorm.
 * User: Yongbo
 * Date: 2017/12/22
 * Time: 11:30
 */
class UseFun
{

    function chinesesubstr($str, $start, $len)
    {
        $strlen = $start + $len;
        $tmpstr = "";
        for ($i = 0; $i < $strlen; $i++) {
            if (ord(substr($str, $i, 1)) > 0xa0) {
                $tmpstr .= substr($str, $i, 2);
                $i++;
            } else
                $tmpstr .= substr($str, $i, 1);
        }
        return $tmpstr;
    }
}