<?php
require_once('./layout/TableView.php');

function AnalysisItemView($item){
    View(AnalysisItem( $item));
    View(AnalysisItemDetail($item));
}
function AnalysisItemDetail($item) {
    $tradeControl = "
        <div class='ds-order-control'>
            <div class='ds-load-submit ds-info-cell'>修改</div>
            <div class='ds-load-submit ds-info-cell'>删除</div>
        </div>
    ";
    $returnValue = "<div class='ds-scroll'><table class='ds-table ds-analysis-detail'>";
    $tableTitle1 = ['日期', '摘要', '金额(元)', '付款(元)', '欠款(元)'];
    $tableTitle2 = ['日期', '摘要', '金额(元)', '利润(元)'];
    if($item == 'person' || $item == 'production') {
        $tableTitle1 = $tableTitle2;
    }
    $returnValue .= tableRowView($tableTitle1, 'ds-first-tr');      
    $returnValue .= "</table></div></div></div>";
    return $returnValue.$tradeControl;
}
function AnalysisItem( $item ){ 
    $extra       = '';
    $title1      = ['额', '量', '润'];
    $title2      = ['额', '量', '欠'];
    $title       = "<div class='ds-info-cell ds-sort'>";
    $order_item  = 'order_'.$item;

    if($item != 'person' && $item != 'production') {
        $title1 = $title2;
    }
    foreach ($title1 as $key => $value) {
        $title .= " <div id=' $key' class='ds-info-cell ds-sort-row' >$value</div>";
    }
    $title .= '</div>';

    $mysql      = new MysqlOperation("ht_finance");
    $results    = $mysql -> select([], [], '', $item);
    $plus       = "<div class='ds-analysis-report'>
                        <div title='添加交易明细' class='ds-report-plus'>+</div>
                    </div>";
    $html       = "<div><div class='ds-abstract-search'>
                        <div class='ds-load-input ds-analysis-search'>
                            $title
                            <input type='text' placeholder='被检索的关键字……'/>
                        </div> 
                        <div id='$item' class='ds-analysis'>";
    if( $item =='person'|| $item == 'production') {
        $plus       = '';
    }
    while( $row = mysql_fetch_array( $results ) ){
        $name       = $row['name'];
        $phone      = isset($row['phone_number'])? $row['phone_number'] : '';
        $address    = isset($row['address'])? $row['address'] : '';
        $html1      = '';
        $html2      = '';
        $html3      = '';
        $html4      = '';        
        $results1   = $mysql -> selectType('sum(money)', [$item.'= '], [$name], '', $order_item);   
        $results1 = round($results1, 2);
        $html1      = "<div class='ds-info-cell'>额：<span>$results1</span>元;</div>";             
        $results3   = $mysql -> selectType('count(money)', [$item.'= ', 'production<> '], [$name,''], '', $order_item);
        $html3      = "<div class='ds-info-cell'>量：<span>$results3</span>批;</div>";
        if($item != 'person' && $item != 'production') {
            $had = 'sum(pained)';
            if($item == 'buyer') {
                $had    = 'sum(gained)';
            }
            $results4   = $mysql -> selectType($had, [$item.'= '], [$name], '', $order_item);
            $results4   = $results1 - $results4;   
            $results4 = round($results4, 2);         
            $html4      = "<div class='ds-info-cell'>欠：<span>$results4</span>元;</div>";
        }else {
            $results2   = $mysql -> selectType('sum(pure_gain)', [$item.'= '], [$name], '', $order_item);
            $results2 = round($results2, 2);
            $html2      = "<div class='ds-info-cell'>润：<span>$results2</span>元;</div>";
        }        
        $html          .= "
            <div class='ds-analysis-item'>
                <label>$name</label>
                <div class='ds-info-item'>
                    $html1
                    $html3
                    $html2
                    $html4
                </div>
                $plus
                <div class='ds-green'>$phone$address</div>
            </div>            
        ";
    }
    $beginDate = "<div class = 'ds-info-cell'><select>";
    $html .= "</div></div><div class='ds-detail-table'>
        <div class='ds-load-input'><label>起始日期:</label><input type='date' placeholder='8位数字'/>
                                  <label>终止日期:</label><input type='date' placeholder='日期或天数'/></div>";
    return $html;
}
?>
