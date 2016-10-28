<?php
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
require_once('../constant.php');
require_once('./DebtProcess.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $today = time(); 
    $orderData = [];
    array_push( $orderData, $today);
    foreach ($_POST as $value) {
       array_push( $orderData, $value);
    }
    $firstData = preg_match('/^[0-9]{8}$/', $orderData[1]);
    if($firstData) { 
        $Mysql = new MySqlOperation("ht_finance");     
        try{            
            $result = $Mysql -> insert( $ORDERS_OPERATION_EN, $orderData, 'orders1');
            if( !$result) {
                throw new Exception( '有错误！');
            }else {
                ViewScript( "alert('录入成功！');window.location ='$operationUrl'" );
            }
        }catch  (Exception $error) {
            ViewScript( "alert('$error');history.go(-1)" );
        }    
    }else {
        ViewScript( "alert('日期格式不正确, 8位数字');history.go(-1)" );
    }
}
?>
