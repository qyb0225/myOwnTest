<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./constant.php');
require_once('./layout/Header.php');
require_once('./layout/UserLoginView.php');

//body内容从这儿开始
$error = '';
if($_GET && $_GET['error']){
    $error = $_GET['error'];
}
UserLoginView($error);
//body结束
require_once('./layout/Footer.php');
// <input class='ds-load-submit' type='button' name='change' value='修 改'/>
?>
