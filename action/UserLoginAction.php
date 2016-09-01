<?php
require_once('../config.php');
require_once('../tool/View.php');
require_once('../tool/MySqlOperation.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $results = null;
    if( $_POST['username'] && $_POST['password']){
         $password = md5($_POST['password']);
         $Mysql = new MySqlOperation("ht_finance");
         $results = $Mysql -> select(["username = ","password = "],[$_POST['username'], $password],'',"user");
         $num_results = mysql_num_rows($results);
         if($num_results > 0){
             session_start();
             $_SESSION['username'] = $_POST['username'];
             header("Location: ../main.php");
         }else{
             header("Location: ../home.php?error=密码或者用户名错误!");
         }
    }else{
        header("Location: ../home.php?error=密码或者用户名不能为空!");
    }



}
?>
