<?php 
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['orderId']) && isset($_GET['state']) ) {
    $orderId = $_GET['orderId'];
    $state = $_GET['state'];
    $returnTable = [
        'orders', 'order_buyer', 'order_express', 'order_production', 
        'order_provider', 'order_person', 'order_factory'
    ]; 
    $Mysql = new MySqlOperation("ht_finance");
    foreach ($returnTable as $value) {
      $echo = $Mysql -> update(['state'],[ $state], ['order_id = '], [$orderId], $value);
      View($echo.'<br/>');
    }
    ViewScript( "history.go(-1);alert('成功！');" );
}
?>
