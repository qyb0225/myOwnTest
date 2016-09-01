<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./layout/Header.php');
require_once('./layout/NavBar.php');
require_once('./layout/AdditionItemsView.php');
require_once('./tool/ControlorJs.php');
require_once('./tool/userAuth.php');
require_once('./constant.php');
navBarView("addition", $username);
View("<div class='ds-title'><h3>添加相关信息</h3></div>");
if(!$_GET){
    $item = 'person';
}else{
    $item = $_GET['item'];
}
AddtionBarView($item);
AdditionItemsView($item);
AdditionJsPost();
require_once('./layout/Footer.php');
?>
