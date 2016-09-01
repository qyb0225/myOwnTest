<?php 
function debtProcess($obj, $data, $table) {
    if($obj != 'person' && $obj != 'production') {
        $dataLength = count($data);
        $Mysql = new MySqlOperation("ht_finance");
        $results = $Mysql -> select([$obj.'='], [$data[2]], ['order_id DESC'], $table);
        if(is_resource($results)) {
            $firstRow   = mysql_fetch_array($results);
            $debtNum    = $dataLength-1;
            $had        = $dataLength-2;
            $moneyNum   = $dataLength-3;
            $beforeDebt = $firstRow['debt'];
            if($obj === 'factory') {
                $moneyNum   = $dataLength-4;
            }
            $data[$debtNum] = $data[$moneyNum] + $beforeDebt;
            $data[$debtNum] = $data[$debtNum] - $data[$had];
        }
    }
    return $data;
}

?>
