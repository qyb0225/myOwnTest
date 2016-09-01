<?php 
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
require_once('../constant.php');
require_once('./DebtProcess.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['item'] && $_POST['date'] && $_POST['abstract']) {  
    $item                   = $_POST['item'];
    $dataObj                = 'ORDER_'.strtoupper($item);
    $dataObj                = $$dataObj;
    $initdata               = initPostJson($dataObj);
    $initdata['order_id']   = time();
    $initdata['date']       = $_POST['date'];
    $initdata[$item]        = $_POST['obj'];
    $initdata['number']     = $_POST['abstract'];
    $table                  = 'order_'.$item;
    $painGain               = 'pained' ;
    if( $item == 'buyer' ) {
        $painGain = 'gained' ;
    }
    $initdata[$painGain]    = $_POST['had'];

    $dataArray              = Array();
    foreach ($initdata as $value) {
        View($value.'/<br/>');
        array_push($dataArray, $value);
    }

    $dataArray = debtProcess($item, $dataArray, $table);
    array_push($dataObj, 'state');
    array_push($dataArray, '1');
    $Mysql = new MySqlOperation("ht_finance");
    $Mysql -> insert($dataObj, $dataArray, $table);
}
function initPostJson($obj) {
    $arr = Array();
    foreach ($obj as $value) {
        $arr[$value] = '';
    }
    return $arr;
}
?>
