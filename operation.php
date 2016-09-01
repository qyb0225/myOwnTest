<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./constant.php');
require_once('./layout/Header.php');
require_once('./layout/NavBar.php');
require_once('./layout/OperationView.php');
require_once('./tool/ControlorJs.php');
require_once('./tool/userAuth.php');
navBarView("operation", $username);
$orderId = '';
$title = '订 单 录 入';
$class = "class='ds-title'";
if(isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
    $title = '订 单 修 改';
    $class = "class='ds-title ds-red'";
}
View("<div $class><h3>$title</h3></div>");
OperationView($orderId);
ProductionChoice();
OperationJsPost();
require_once('./layout/Footer.php');
?>
