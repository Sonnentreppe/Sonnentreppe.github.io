<?php
/**
 * Created by PhpStorm.
 * User: mechrevo
 * Date: 2018/5/10
 * Time: 11:20

 */

class db{
    function __construct(){
        $mydbhost="localhost"; //mysql主机
        $mydbuser="root"; //mysql用户名
        $mydbpw  ="98A06f91d529"; //mysql密码
        $mydbname="test"; //数据库名
        $this->mysqli = new mysqli($mydbhost,$mydbuser, $mydbpw, $mydbname);

        if ($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') '
                . $this->mysqli->connect_error);
        }
        $this->query("SET NAMES UTF8");
    }
    //run sql语句

    function query($sql){
        return $this->mysqli->query($sql);
    }
//close mysql
    function  close(){
        $this->mysqli->close();
    }

}