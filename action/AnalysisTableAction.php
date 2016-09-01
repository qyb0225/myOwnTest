<?php 
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
    $jsondata  = array();
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['item'])) {
    $item      = $_GET['item'];
    $itemTable = 'order_'.$item;
    $Mysql     = new MySqlOperation("ht_finance");
    if(isset($_GET['obj'])) {
        $obj       = $_GET['obj'];
        $results   = $Mysql -> select([$item.'= '], [$obj], ['date DESC'], $itemTable);
    }else {
        $results   = $Mysql -> select([], [], ['date DESC'], $itemTable);
    }
    if(is_resource($results)) {
        while($row = mysql_fetch_assoc($results)) {
            array_push($jsondata, $row);
        }
    }
}
    exit(json_encode($jsondata));
?>
