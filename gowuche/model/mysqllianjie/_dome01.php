<?php

header('content-type:text/html;charset=utf8');

$servername = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "shop" ;


$conn = mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_error()){
    die('连接失败') ;
}/*  else {
    echo '连接成功' ;
}  */
//连接数据库

?>