<?php
/*
* author:dsmile
* contact:852353443@qq.com
* discription:这是一个数据库基本操作的类，包括增、删、查、改；
**/
class MySqlOperation{
    function MySqlOperation( $table ){
        $con = mysql_connect(LOCAlHOST,_ROOT,_PW);
            if (!$con)
            {
                die('Could not connect: ' . mysql_error());
            }
        mysql_select_db($table, $con);
    }
function Query() {
    
}

/*
*插入数据，3个输入变量，obj：类别，data：数据，这两个是一一对应的，tableName,增加数据的表对象
*/
    function insert( $obj, $data, $tableName){
        $values = '';
        $keys = '';
        // $results = $this -> select($obj, $data, '', $tableName);
        // if(is_resource($results)) {
        //     return false;
        // }
        if(count($data) == count($obj)){
            foreach ($data as $value) {
                $values .=  "'$value'".',';
            }
              foreach ($obj as $key) {
                $keys .= $key.',';
            }
            $values = substr($values, 0, -1);
            $keys = substr($keys, 0, -1);
            $sql = "INSERT INTO $tableName ($keys) VALUES ($values)";
            mysql_query($sql);
            return $sql;
        }

    }
/*
*删除数据，2个输入变量，condition：条件（二维，e.g.['id','13']），tableName,增加数据的表对象
*/
    function delete( $condition, $tableName){
        if($condition && $tableName){
            if( count($condition) == 2){
               $sql = "DELETE FROM $tableName WHERE $condition[0]='$condition[1]'";
                mysql_query($sql);
            }
        }

    }
/*
*查询数据库，3个输入变量，obj：类别，data：数据，这两个是一一对应的，tableName,增加数据的表对象
*/
    function select( $obj, $data, $orderBy, $tableName){
        $values = '';
        $order  = '';
        if(count($data) == count($obj) && count($data) > 0){
            foreach ($data as $key =>$value) {
                $values .= " $obj[$key] '$value' AND ";
            }
            $values = " WHERE ".substr($values, 0, -5);
        }
        if($orderBy){
            $order = " order by ";
            foreach ($orderBy as $value) {
                 $order .= "$value".",";
            }
            $order = substr($order, 0, -1);
        }
        $sql = "select * from $tableName$values$order";
        $results = mysql_query($sql);
        return $results;
    }
    function selectBetween( $obj, $data, $orderBy, $obj1, $start, $end,$tableName){
       $values = '';
        $order = '';
        if(count($data) == count($obj) && count($data) > 0){
            foreach ($data as $key =>$value) {
                $values .= " $obj[$key] '$value' AND ";
            }
            $values = " WHERE ".substr($values, 0, -5);
        }
            $order = " ORDER BY $orderBy";
        if($obj1){
            $Between = " AND $obj1 BETWEEN '$start' AND '$end' ";
        }
        $sql = "select * from $tableName$values$Between$order";        
        $results = mysql_query($sql);
        return $results;
    }

    function selectType( $type='*', $obj, $data, $orderBy, $tableName){
        $values = '';
        $order  = '';
        if(count($data) == count($obj) && count($data) > 0){
            foreach ($data as $key =>$value) {
                $values .= " $obj[$key] '$value' AND ";
            }
            $values = " WHERE ".substr($values, 0, -5);
        }
        if($orderBy){
            $order = " order by ";
            foreach ($orderBy as $value) {
                 $order .= "$value".",";
            }
            $order = substr($order, 0, -1);
        }
        $sql = "select $type from $tableName$values$order";
        $results = mysql_query($sql);
        if(is_resource($results)) {
            $result = mysql_fetch_array($results);
            if(!$result[0]) {
                return 0;
            }
            return $result[0];
        }
        return 0;
    }
    function update( $obj, $data, $condition, $conditionValue, $tableName) {
        $values = '';
        $where = "";
        if( count($condition) == count($conditionValue) && count($conditionValue) > 0 ){
            foreach ($conditionValue as $key =>$value) {
                $where .= "$condition[$key] '$value' AND ";
            }
            $where = " WHERE ".substr($where, 0, -5);
        }else{
            return;
        }
        if(count($obj) == count($data) && count($data) > 0){
            foreach ($obj as $key => $value) {                
                $values .= $value." = '$data[$key]',";
            }
            $values = substr($values, 0, -1);
        }
        $sql = "UPDATE $tableName SET $values$where";
        mysql_query($sql);
        return $sql;
    }
    function plus($obj, $data, $condition, $conditionValue, $tableName) {
        $mySql = new MySqlOperation( "ht_finance" );

        $results = $mySql -> select( $condition, $conditionValue, '', $tableName);
        $result = mysql_fetch_array( $results );
        $dataBefore = $result[$obj];
        $dataAfter = (int)$dataBefore + (int)$data;
        $mySql -> update( $obj, $dataAfter, $condition, $conditionValue, $tableName);
    }
}

?>
