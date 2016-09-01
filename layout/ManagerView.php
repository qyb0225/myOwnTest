<?php 

function ManagerView() {
    $returnStr = "
<div class='ds-title'><h3>用户管理</h3></div>
<form class='ds-form ds-center' action='./action/ManagerAction.php' method='POST'>
    <div class='ds-load-item'>
        <div class='ds-load-label'><label>原用户名:</laber></div>
        <div class='ds-load-input'><input type='text' name='username1'/></div>
    </div>
    <div class='ds-load-item'>
        <div class='ds-load-label'><label>原密码:</laber></div>
        <div class='ds-load-input'><input type='password' name='password1'/></div>
    </div>   
    <div class='ds-load-item'>
        <div class='ds-load-label'><label>新用户名:</laber></div>
        <div class='ds-load-input'><input type='text' name='username2'/></div>
    </div>
    <div class='ds-load-item'>
        <div class='ds-load-label'><label>新密码:</laber></div>
        <div class='ds-load-input'><input type='password' name='password2'/></div>
    </div>
    <div class='ds-load-item'>
        <div class='ds-load-label'><label>再输一次:</laber></div>
        <div class='ds-load-input'><input type='password' name='password3'/></div>
    </div>
    <div class='ds-load-item'>
        <button type='submit' class='ds-load-submit'>修 改</button>
    </div>
</form>     
    ";
    View($returnStr);
}


?>
