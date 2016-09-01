<?php 
require_once('./config.php');
require_once('./tool/View.php');

$con = mysql_connect(LOCAlHOST, _ROOT, _PW);
if(!$con) {
    die('Could not connect: ' . mysql_error());
}else {
     mysql_select_db('ht_finance', $con);
}
$tables =  array(
    'orders' => ['date_provider','date_factory1', 'date_factory2', 'date_factory3', 'date_factory4', 'date_factory5', 'date_factory6'],
    'order_provider' => ['date_provider'],
    'order_factory' => ['date_factory']    
);
foreach ($tables as $key => $value1) {
    foreach ($value1 as $value2) {
        $sql="ALTER TABLE $key  ADD $value2 varchar(12) ";
        $result = mysql_query($sql, $con);
        View($sql.'<hr />');
        if(!$result) {
            die('失败！');
        }
    }
}
?>