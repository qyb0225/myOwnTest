<?php

function AddtionBarView($item){
    analysis_additionBarView($item,'addition');
}
function AnalysisBarView($item){
    analysis_additionBarView($item,'analysis');
}
function analysis_additionBarView($item, $link){
    $li1 = ($item == 'person'? 'addition-active':'');
    $li2 = ($item == 'buyer'? 'addition-active':'');
    $li3 = ($item == 'provider'? 'addition-active':'');
    $li4 = ($item == 'factory'? 'addition-active':'');
    $li5 = ($item == 'production'? 'addition-active':'');
    $li6 = ($item == 'express'? 'addition-active':'');
    $addtionbar = "
            <div class='ds-addition-ul'>
                <ul>
                    <li class='$li1'><a href='./$link.php?item=person'>负责人</a></li>
                    <li class='$li2'><a href='./$link.php?item=buyer'>客户</a></li>
                    <li class='$li3'><a href='./$link.php?item=provider'>供应商</a></li>
                    <li class='$li4'><a href='./$link.php?item=factory'>加工厂</a></li>
                    <li class='$li5'><a href='./$link.php?item=production'>产品</a></li>
                    <li class='$li6'><a href='./$link.php?item=express'>物流</a></li>
                </ul>
            </div>
    ";
    View( $addtionbar );
}
function navBarView($page, $username){
    $li1 = ($page == 'main'? 'li-active':'');
    $li2 = ($page == 'operation'? 'li-active':'');
    $li3 = ($page == 'analysis'? 'li-active':'');
    $li4 = ($page == 'addition'? 'li-active':'');
    $navBar = "
    <div class='ds-navBar'>
        <div class='ds-nav-ul'>
            <ul>
                <li class='$li1'><a href='./main.php'>总表</a></li>
                <li class='$li2'><a href='./operation.php'>操作</a></li>
                <li class='$li3'><a href='./analysis.php?item=person'>明细</a></li>
                <li class='$li4'><a href='./addition.php'>添加</a></li>
            </ul>
        </div>
        <div class='ds-user'>
            <a>$username</a>
            <div class='ds-user-operation'>
                <ul>
                    <li><a href='./manager.php'>用户管理</a></li>
                    <li><a href='./action/ExitAction.php'>退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    ";
    View( $navBar );
};


?>
