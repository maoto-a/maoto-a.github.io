<?php
     header("content-type:text/html;charset=utf-8") ;

     $link = mysqli_connect('localhost','root','','user') ;

     mysqli_set_charset($link,'utf8') ;//封装好的php连接直接调用
?>