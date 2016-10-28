<?php
require_once('./layout/SlideChoiceView.php');

function OperationView($orderId) {
    View( OperationItem($orderId) );
}

function OperationItem($orderId) {
    global $ORDERS_OPERATION_CH;
    global $ORDERS_OPERATION_EN;
    $action = './action/Operation2Action.php';
    if($orderId) {
        $mysql = new MysqlOperation("ht_finance");
        $inputValue = [];
        $results = $mysql -> select(['order_id= '], [$orderId], [],"orders");
        if(is_resource($results)) {
            $inputValue = mysql_fetch_array( $results );
            $action = './action/Operation2Action.php?orderId='.$orderId;
        }       
    }   
    $result = "<div><form class='ds-operation' action='$action' method='POST'>";
    $i = 0;
    $row = [1, 6, 7, 8, 8, 8, 8, 8, 8,3, 3];
    $k = 1;
    foreach ($row as $value) {
        $j = 0;
        $result .= "<div class='ds-load-item ds-inline-block ds-bottom-line'>";
        while($j < $value) {
            $fisrtItem = '';
            if($j == 0) {
               $fisrtItem = "ds-yellow";  
            }
            $text = '';
            if(isset($inputValue)) {
                $text = $inputValue[$ORDERS_OPERATION_EN[$k]];
            }            
            $name = "operation".$i;
            $result .= " <div class='ds-load-label $fisrtItem'>$ORDERS_OPERATION_CH[$i]:</div>
                         <div class='ds-load-input'><input id='$name' name='$name' type='text' value='$text'/></div>";
            $j++;
            $i++;
            $k++;
        }
        $result .= "</div>";
    }

    $result .= "<div class='ds-newline'><button id='operationPostId' class='ds-load-submit' type='sunmit'>提交</button></div></form>
                </div>";
    return $result;
}

function ProductionChoice(){
    $mysql = new MysqlOperation("ht_finance");
    $items1 = $mysql -> select([],[],'','production');
    $items2 = $mysql -> select([],[],'','buyer');
    $items3 = $mysql -> select([],[],'','person');
    $items4 = $mysql -> select([],[],'','express');
    $items5 = $mysql -> select([],[],'','provider');
    $items6 = $mysql -> select([],[],'','factory');
    View(addRadioItemsBySql( $items1, "production", ["name", "unit"]));
    View(addRadioItemsBySql( $items2, "buyer", ["name"]));
    View(addRadioItemsBySql( $items3, "person", ["name"]));
    View(addRadioItemsBySql( $items4, "express", ["name"]));
    View(addRadioItemsBySql( $items5, "provider", ["name"]));
    View(addRadioItemsBySql( $items6, "factory", ["name"]));
}
?>
