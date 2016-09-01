<?php

function addCheckboxItems( $items ,$label) {
    $results = "<div class='ds-checkbox-items'>";
    $flag = 1;
    while($row = mysql_fetch_array($items)) {
        $results .= addCheckboxItem($label.$flag,$row['name']);
        $flag = $flag + 1;
    }
    $results .= "<div class='ds-load-submit small ds-checkbox-button'>确定</div></div>";
    return $results;
}
function addCheckboxItem($label, $name) {
    $item = "<div class='ds-checkbox-item'>    
        <div class='ds-checkbox-slide ds-checkbox-title '>$name</div>
        <div class='ds-checkbox'>
            <input type='checkbox' id='$label' name='belong'/>
            <label for='$label'></label>
        </div>  
    </div> ";
    return $item;
}

function addRadioItemsBySql( $items, $label, $types) {
    $results = "<div id=$label class='ds-checkbox-items'>";
    $flag = 1;
    while($row = mysql_fetch_array($items)) {
         $content = '';
        foreach ($types as  $value) {
            $content .= $row[$value];
        }
        $results .= addRadioItem($content);
        $flag = $flag + 1;
    }
    $results .= "<div class='ds-load-submit small ds-radio-cancel' onclick='$(this).parent().slideUp(500)'>取消</div></div>";
    return $results;
}
function addRadioItem($name) {
    $item = "<div class='ds-checkbox-item ds-slide'>    
        <div class='ds-checkbox-title ds-radio-slide' title= $name >$name</div>
    </div> ";
    return $item;
}


?>
