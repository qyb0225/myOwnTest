<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./layout/Header.php');
require_once('./layout/NavBar.php');
require_once('./layout/AnalysisItemsView.php');
require_once('./tool/ControlorJs.php');
require_once('./tool/userAuth.php');
require_once('./constant.php');
navBarView("analysis", $username);
View("<div class='ds-title'><h3>数据统计分析</h3></div>");
$item = 'order_person';
if(isset($_GET['item'])){
    $item = $_GET['item'];
}
AnalysisBarView($item);
AnalysisItemView($item);
AnalysisJsPost();
require_once('./layout/Footer.php');
?>
