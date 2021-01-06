<?php
header('Content-Type:text/html;charset=utf-8');
$user = $_GET['user'];
$pass = $_GET['pass'];
$type = $_GET['type'];

$link = mysqli_connect('localhost','root','','user');
if(!$link){
 die('{"err":-1,"mag":"连接失败"}');
}
//空值判断
if(!$user || !$pass || !$type){
    die('{"err":-2,"mag":"账号或密码为空"}');

} else {
  //登陆   
if($type === 'login'){
 //查询sql语句
 $login_sql = "select * from zhanghu where username='$user' and
 passw= '$pass'";

 //执行sql语句
 $login_res = mysqli_query($link,$login_sql);
 $login_arr = mysqli_fetch_all($login_res,1);
 if(count($login_arr) > 0) {
    echo '{"err":0,"mag":"登陆成功"}' ;
 } else {
     echo '{"err":-2,"mag":"账号或密码错误"}' ;
 }
}
// 注册
if ($type === 'add') {
    // 先查询注册的账号是否已存在
    $query_sql = "select * from zhanghu where username='$user'";
    $query_res = mysqli_query($link,$query_sql);
    $query_arr = mysqli_fetch_all($query_res,1);
    if (count($query_arr) > 0) {
      echo '{"err":-4,"msg":"账号已被占用"}';
    } else {
      // 可以注册，插入数据
      $insert_sql = "insert into zhanghu(username,passw) values('$user','$pass')";
      mysqli_query($link,$insert_sql);
      $num = mysqli_affected_rows($link);
      if ($num > 0){
        echo '{"err":1,"msg":"注册成功"}';
      } else {
        echo '{"err":-5,"msg":"注册失败"}';
      }
    }
  }

}
mysqli_close($link);
?>