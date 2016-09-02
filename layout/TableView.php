<?php
    function TableView($page = 'main'){
        global $ORDERS_CH;
        $selectedM = '';
        $selectedY = '';
        $begin     = '00000000';
        $end       = '99999999';
        if(isset($_GET['month'])) {
            $selectedM = $_GET['month'];
            if($selectedM != 'all') {
                $begin     = $selectedM.$begin;
                $end       = $selectedM.$end;            
            }          
        }
        if(isset($_GET['year'])) {
            $selectedY = $_GET['year'];
            if($selectedY != 'all') {
                $begin     = $selectedY.$begin;
                $end       = $selectedY.$end;
            }
        }
        $main  = '订单利润表';       
        $Mysql = new MySqlOperation("ht_finance");
        $maxDate = $Mysql -> selectType('max(date)', [], [], '', 'orders'); 
        $minDate = $Mysql -> selectType('min(date)', [], [], '', 'orders'); 

        $returnClass ='';
        $title = "<div class='ds-title'><h3>$main</h3></div>";
        $yearMonthNumberResult = yearMonthNumber($minDate, $maxDate, $selectedY, $selectedM);
        $yearHtml  = $yearMonthNumberResult[0];
        $monthHtml = $yearMonthNumberResult[1];
        if(!$selectedM && !$selectedY) {
            if($yearMonthNumberResult[3] < 10){
                $yearMonthNumberResult[3] = '0'.$yearMonthNumberResult[3];
            }
           $begin = $yearMonthNumberResult[3].$begin; 
           $end   = $yearMonthNumberResult[3].$end; 

           $begin = $yearMonthNumberResult[2].$begin; 
           $end   = $yearMonthNumberResult[2].$end; 
        }
        $begin = substr($begin, 0, 8);
        $end   = substr($end, 0, 8);
        $control = "
            <div class = 'ds-statistic'>
                <div class = 'ds-info-cell'><label>订单:</label><span id='calc0'></span> 次</div>
                <div class = 'ds-info-cell'><label>商品:</label><span id='calc1'></span> 批</div>
                <div class = 'ds-info-cell'><label>金额:</label><span id='calc5'></span> 元</div>
                <div class = 'ds-info-cell'><label>利润:</label><span id='calc15'></span>  元</div>
                $yearHtml
                $monthHtml
                
                <div class = 'ds-right'>
                    <div class='ds-load-input ds-main-table'><input type='text' placeholder='被检索的关键字……'/></div>
                </div>          
            </div>";
        $tableContent = '';
        $tableTitleItem = '';
        $tableEnd = "</table>";
        foreach ($ORDERS_CH as $value) {
            $tableTitleItem .= "<td>$value</td>";
        }
        $tableTitle = "<table id='exportTable' class='ds-table'><tr class='ds-first-tr'>$tableTitleItem</tr>";
        $num = 0;
        $judgeByDate = 0;
        $judgeByBuyer = '';
        // $results = $Mysql -> select(['state= '],[0],['date DESC'],"orders"); 
        $results = $Mysql -> selectBetween( ['state= '],[0], 'date ASC', 'date', $begin, $end, "orders");

        while($row = mysql_fetch_array( $results )){
            $class = 'ds-tr-color';
            if( $row['date'] != $judgeByDate || $row['buyer'] != $judgeByBuyer){
                $num = $num + 1;
                $class = 'ds-tr-color'.($num%2);
            }else{
                $class = 'ds-tr-color'.($num%2);
                $tableContent .= orderTable($row,'',$class);
                $judgeByDate  = $row['date'];
                $judgeByBuyer = $row['buyer'];
                continue;
            }
            $judgeByDate = $row['date'];
            $judgeByBuyer = $row['buyer'];
            $tableContent .= orderTable($row, $num, $class);
        }
        $orderControl = "
            <div class='ds-order-control'>
               <div id='revise' class='ds-load-submit ds-info-cell'>修改</div>
            </div>
        ";
        $tableContent = $title.$control.$tableTitle.$tableContent.$tableEnd.$orderControl;
        View($tableContent);
    }
function yearMonthNumber($fMinDate, $fMaxDate, $selectedYear, $selectedMonth) {
    $date1Y = intval(date( 'Y', strtotime($fMinDate))); 
    $date1M = intval(date( 'm', strtotime($fMinDate))); 
    $date2Y = intval(date( 'Y', strtotime($fMaxDate))); 
    $date2M = intval(date( 'm', strtotime($fMaxDate)));

    $returnYearHtml  = "<div class = 'ds-info-cell'><select>";
    $returnMonthHtml = "<div class = 'ds-info-cell'><select>";
    
    if(!$selectedYear) {
        $selectedYear = $date2Y;
    }
    if(!$selectedMonth) {
        $selectedMonth = $date2M;
    }

    $ystart = $date1Y;
    $yend = $date2Y;
    if($selectedYear =='all') {
        $returnYearHtml .= "<option selected>all</option>";
    }else {
         $returnYearHtml .= "<option>all</option>";
    }
    for($i = $yend; $i>= $ystart; $i--) {
        $selected = ' ';
        if($i == $selectedYear) {
            $selected = "selected";
        }
        $returnYearHtml .= "<option $selected>$i</option>";
    }

    $star = 1;
    $end  = 12;
    if($date1Y == $selectedYear) {
        $star = $date1M;
    }
    if($date2Y == $selectedYear) {
        $end = $date2M;
    }
    if($selectedMonth =='all' || $selectedYear =='all') {
        $returnMonthHtml .= "<option selected>all</option>";
    }else {
        $returnMonthHtml .= "<option>all</option>";
    }
    for($j = $end ; $j >= $star; $j-- ) {
        $selected = ' ';
        if($j == $selectedMonth) {
            $selected = "selected";
        }
        if($j< 10) {
            $j = '0'.$j;
        }
        $returnMonthHtml .= "<option $selected >$j</option>";
    }
    
    $returnYearHtml  .= "</select></div>";
    $returnMonthHtml  .= "</select></div>";
    return [$returnYearHtml, $returnMonthHtml, $date2Y, $date2M];
}

function orderTable($data,$num,$class){
    global $ORDERS_EN;
    global $ORDERS_TITLE_EN;
    $contents = "<td class='ds-control'>$num </td>";
    foreach ($ORDERS_EN as $key => $value) {
        $title = '';
        $title_item = $ORDERS_TITLE_EN[$key];
        if($title_item && $data[$title_item]){
            $title = "title="."'$data[$title_item]'";
        }else if($title_item && !$data[$title_item] ){
            $title = "title='无'";
        }
        $contents .= "<td $title>".$data[$value]."</td>";
    }
    return "<tr id=".$data['order_id']." class='$class'>".$contents."</tr>";
}
    
function tableRowView($content, $class='') {
    if($class) {
        $class = "class=$class";
    }
    $tableRow = "<tr $class>";
    foreach ($content as $value) {
        $tableRow .= "<td>$value</td>";
    }
    $tableRow .= '</tr>';
    return $tableRow;
}
?>
