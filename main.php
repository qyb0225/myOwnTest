<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./constant.php');
require_once('./layout/Header.php');
require_once('./layout/NavBar.php');
require_once('./layout/TableView.php');
require_once('./tool/userAuth.php');
require_once('./tool/ControlorJs.php');

navBarView("main", $username);
TableView();
MainJsPost();
require_once('./layout/Footer.php');
?>
