<?php 
require_once('../config.php');
require_once('../tool/MySqlOperation.php');
require_once('../tool/View.php');
require_once('../constant.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $originUn   = $_POST['username1'];
    $newUn      = $_POST['username2'];
    $originPw   = md5($_POST['password1']);
    $newPw      = md5($_POST['password2']);
    $newPw2     = md5($_POST['password3']);
    $table      = 'user';
    if($newPw === $newPw2) {
        $Mysql      = new MySqlOperation("ht_finance");
        $result     = $Mysql -> select([$USER[0].'=' ,$USER[1].'='], [$originUn, $originPw], [], $table);
        // $row = mysql_fetch_array( $result);
        // View($result);
        if(is_resource( $result )) {
            $Mysql -> update($USER, [$newUn, $newPw], ['id='], [1], $table);
            ViewScript("alert('修改成功！下次登陆生效！');history.go(-1)");
        }else {
            ViewScript("alert('原始信息不正确！');history.go(-1)");
        }
    }else {        
            ViewScript("alert('请重试！两次输入的新密码不一样！');history.go(-1)");
    }
}
?>
