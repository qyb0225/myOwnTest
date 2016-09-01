<?php
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
require_once('../constant.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $table    = $_POST['item'];
    $charData     = $_POST['chardata'];
    $tableChar  = $_POST['tablechar'];
    $Mysql    = new MySqlOperation("ht_finance");
    $Mysql -> delete([$tableChar, $charData], $table);
}
?>