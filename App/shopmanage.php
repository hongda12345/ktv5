<?php
/**
 * Created by PhpStorm.
 * User: 宏达
 * Date: 2017/11/12
 * Time: 19:20
 */
class shopmanage{
    function index(){
        include 'App/views/shopmanage.html';
    }
    function insert(){
        $sname=$_GET['sname'];
        $type=$_GET['type'];
        $hot=$_GET['hot'];
        $price=$_GET['price'];
        $thumb=$_GET['thumb'];
        $description=$_GET['description'];
        $capticy=$_GET['capticy'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $data=$mysql->query("insert into shop (sname,type,hot,price,thumb,description,capticy) VALUES ('{$sname}','{$type}'),'{$hot}'),'{$price}'),'{$thumb}'),'{$description}'),'{$capticy}')");
        if($mysql->affected_rows){
            echo 'ok';
            exit();
        }else {
            echo 'error';
        }
    }
    function show(){
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $data=$mysql->query("select * from shop")->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }
    function delete(){
        $ids=$_GET['id'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $data=$mysql->query("delete from shop where sid=$ids");
        if($mysql->affected_rows){
            echo 'ok';
            exit;
        }
        echo 'error';
    }
    function update(){
        $value=$_GET['value'];
        $type=$_GET['type'];
        $hot=$_GET['hot'];
        $price=$_GET['price'];
        $thumb=$_GET['thumb'];
        $description=$_GET['description'];
        $capticy=$_GET['capticy'];
        $id=$_GET['id'];
        $mysql=new mysqli('localhost','root','','ktv',3306);
        $mysql->query('set names utf8');
        $data=$mysql->query("update shop set $type='{$value}',$hot='{$hot}',$price='{$price}',$thumb='{$thumb}',$description='{$description}',$capticy='{$capticy}' where sid=$id")->fetch_all(MYSQLI_ASSOC);
        if($mysql->affected_rows){
            echo 'ok';
            exit;
        }
        echo 'error';
    }
}