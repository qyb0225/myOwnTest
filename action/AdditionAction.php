<?php
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
require_once('../constant.php');
if(!$_GET){
    header("location: ../addition.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dditionItem = $_GET['item'];
    $insertData = [];
    $obj = [];
    switch ($dditionItem) {
        case 'person':
            $obj = $PERSON_EN;
            break;
        case 'buyer':
            $obj = $BUYER_EN;
            break;
        case 'factory':
            $obj = $FACTORY_EN;
            break;
        case 'provider':
            $obj = $PROVIDER_EN;
            break;
        case 'production':
            $obj = $PRODUCTION_EN;
            break;
        case 'express':
            $obj = $EXPRESS_EN;
            break;
        default:
            header("location: ../addition.php?item=".$dditionItem);
            break;
        }
        $i = 1;
        $objLength = count($obj);
        foreach ($_POST as $key => $value) {
             array_push( $insertData, $value);
             $i = $i + 1;
             if($i >= $objLength) {
                 break;
             }
         }
         if(!$insertData[0]) {
             ViewScript( "history.go(-1);alert('第一项不能为空！');" );
         }else {
            if($objLength <= count($insertData)) {
                $length = $objLength - 1;
                unset($insertData[$length]);
            }
            $result = AdditionPostData($obj, $insertData, $dditionItem );
            if(!$result) {
                ViewScript( "history.go(-1);alert('请不要重复录入！');" );
            }else {
                ViewScript( "history.go(-1);alert('添加成功！');" );
            }
         }
    }else{
        header("location: ../addition.php?item=".$dditionItem);
    }

function AdditionPostData($obj, $insertData, $tableName ) {
    $today = time();
    array_push($insertData, $today);
    $Mysql = new MySqlOperation("ht_finance");
    $results = $Mysql -> select( [ 'name= '], [ $insertData[0] ], [], $tableName);
    $row = mysql_fetch_array($results);
    if( $row['name'] ) {
        return false;
    }
    $Mysql -> insert( $obj, $insertData, $tableName);
    return true;
}

?>
