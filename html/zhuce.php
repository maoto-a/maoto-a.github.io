<?php
header('Content-Type:text/html;charset=utf-8');
$user = $_GET['user'];
$pass = $_GET['pass'];
$type = $_GET['type'];

$link = mysqli_connect('localhost','root','','user');
if(!$link){
 die('{"err":-1,"mag":"连接失败"}');
}

if($type === 'add'){
    $query_sql = "select * from account where username = '$user' and
    passw= '$pass'";
    $query_res = mysqli_query($link,$query_sql);
    $query_arr = mysqli_fetch_all($query_res,1);
    if(count($query_arr) > 0) {
        echo '{"err":-4,"mag":"账号已被占用"}' ;
     } else {
       //可以注册
        $insert_sql = "insert into zhanghu(username,passw) values   
        ('$user','$pass')" ;
        $insert_res = mysqli_query($link,$insert_sql);
        $num = mysqli_affected_rows($link);
        if($num > 0){
            echo '{"err":1,"mag":"注册成功"}' ;
        } else {
            echo '{"err":-5,"mag":"注册失败"}' ;
        }
     }
    }
   
 mysqli_close($link);
?>