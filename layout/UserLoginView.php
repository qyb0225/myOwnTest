<?php
function UserLoginView($error){
    $content ="
    <div class='ds-title'><h3>惠泰不锈钢财务系统</h3></div>
    <div class='ds-load'>
        <form class='ds-form ds-center' action='./action/UserLoginAction.php' method='POST'>
            <div class='error'>$error</div>
            <div class='ds-load-item'>
            <div class='ds-load-label'><label>用户名:</laber></div>
            <div class='ds-load-input'><input type='text' name='username'/></div>
            </div>
            <div class='ds-load-item'>
            <div class='ds-load-label'><label>密码:</laber></div>
            <div class='ds-load-input'><input type='password' name='password'/></div>
            </div>
            <div class='ds-load-item'>
            <button type='submit' class='ds-load-submit'>登 录</button>
            </div>
        </form>
    </div>
";
View($content);
}


?>
