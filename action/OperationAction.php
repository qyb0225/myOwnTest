<?php
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
require_once('../constant.php');
require_once('./DebtProcess.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $today = time(); 
    $orderData = [];
    $type = '';
    if(isset($_GET['orderId'])) {
        $type = $_GET['orderId'];
    }
    $operationUrl =  '../operation.php';
    if($type) {
        $allorderitems         = ['orders', 'buyer', 'provider', 'express', 'person', 'production', 'factory'];
        $Mysql                 = new MySqlOperation("ht_finance");
        foreach ($allorderitems as $value) {
            if($value != 'orders') {
               $value = 'order_'.$value;
            }
            $Mysql -> delete(['order_id', $type], $value);
        }
        array_push( $orderData, $type);
    }else {
        array_push( $orderData, $today);
    }
    foreach ($_POST as $value) {
       array_push( $orderData, $value);
    }    
    $firstData = preg_match('/^[0-9]{8}$/', $orderData[1]);
    if($firstData) {    
        $allitems         = ['buyer', 'provider', 'express', 'person', 'production'];
        $buyerNum         = ['0', '1', '2', '3', '4', '5', '6', '7', '6'];
        $providerNum      = ['0', '14', '8', '9', '10', '11', '12', '13', '12'];
        $factoryNum       = ['22', '15',  '16', '17', '18', '19', '20', '21', '19'];
        $expressNum       = ['0', '1', '63', '2', '8', '3', '4', '64', '65', '64'];
        $personNum        = ['0', '1', '68', '2', '8', '3', '4', '5', '6', '67'];
        $productionNum    = ['0', '1', '3', '2', '8', '4', '5', '6','67'];
        $length           = count($factoryNum);
        $flag             = 0;       
        foreach ($allitems as $value1) {
            $objData = [];
            $objChar = 'ORDER_'.strtoupper($value1);
            $objNum  = $value1.'Num';
            $table   = 'order_'.$value1;
            foreach ($$objNum as $value2) {
                array_push( $objData, $orderData[$value2]);
            }
            orderItemPostData($$objChar, $objData, $table, $type);
        }   
        for($k=0; $k<6; $k++) {
            $num =  $flag + intval($factoryNum[0]);
            if(!$orderData[$num]) {
                continue;
            }
            $factoryPostData = [];            
            if($type) {
                array_push( $factoryPostData, $type);
            }else {
                array_push( $factoryPostData, $today);
            }
            foreach ($factoryNum as $value3) {
                $value3 = $flag + intval($value3);
                array_push( $factoryPostData, $orderData[$value3]);
            }  
            $table = 'order_factory';
            orderItemPostData($ORDER_FACTORY, $factoryPostData, $table, $type);
            $flag = $flag + $length - 1 ;
        }
        orderItemPostData($ORDERS_OPERATION_EN, $orderData, 'orders', $type);
        if($type) {
            ViewScript( "alert('修改成功！');history.go(-1)" );
        }else {
            ViewScript( "alert('录入成功！');window.location ='$operationUrl'" );
        }
        
    }else {
        ViewScript( "alert('日期格式不正确, 8位数字');history.go(-1)" );
    }
}
function orderItemPostData($obj, $data, $table, $type) {
    if( count($obj) == count($data) ) {
        $Mysql = new MySqlOperation("ht_finance");         
        $Mysql -> insert( $obj, $data, $table);
        return true;
    }else{
        ViewScript( "alert('有问题！请联系管理员！')" );
        return false;
    }
}
?>
