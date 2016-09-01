<?php
require_once('./layout/SlideChoiceView.php');
function AdditionItemsView($item){
    global $PERSON_ADDITION_CH;
    global $BUYER_ADDITION_CH;
    global $FACTORY_ADDITION_CH;
    global $PROVIDER_ADDITION_CH;
    global $EXPRESS_ADDITION_CH;
    global $PRODUCTION_ADDITION_CH;

    switch ($item) {
        case 'person':
            additionWhole($item, $PERSON_ADDITION_CH);
            break;
        case 'buyer':
           additionWhole($item, $BUYER_ADDITION_CH);
            break;
        case 'factory':
            additionWhole($item, $FACTORY_ADDITION_CH);
            break;
        case 'provider':
           additionWhole($item, $PROVIDER_ADDITION_CH);
            break;
        case 'production':
            additionWhole($item, $PRODUCTION_ADDITION_CH);
            productionBelongSlide();
            break;
        case 'express':
            additionWhole($item, $EXPRESS_ADDITION_CH);
            break;
        default:
            View( "Error");
            break;
    }
}
function additionWhole($item, $obj) {
    View( addItems($item,$obj) );
}

function productionBelongSlide() {
    $mysql = new MysqlOperation("ht_finance");
    $results = $mysql -> select([],[],'','provider');
   View(addCheckboxItems( $results ,"belong"));
}
function addItems($item, $itemsData) {
    $returnValue = "<div class='ds-addition'><form class='ds-form ds-center' action="."./action/AdditionAction.php?item="."$item"." method='POST'>";
    foreach ($itemsData as $key => $value) {
        $returnValue .= addItem($value,$item.$key);
    }
    $returnValue .= "<div class='ds-load-item'>
                    <input type='submit' class='ds-load-submit' value='提 交'/ >
                </div></form></div>";
    return $returnValue;
}

function addItem($label, $name) {
    $returnValue = "<div class='ds-load-item'><div class='ds-load-label'><label>$label:</laber></div>
            <div class='ds-load-input'><input id=$name name=$name type='text'/></div></div>";
    return $returnValue;
}
?>
