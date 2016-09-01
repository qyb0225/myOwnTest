<!DOCTYPE html>
<html lang='zh-CN'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>惠泰财务系统</title>
    <link href='./css/finance.css' rel='stylesheet'>
    <script src='./js/jquery-2.1.4.js'></script>
    <script src='./js/dsmile.js'></script>
  </head>
<body>
<?php
$test = ['测试1', '测试2', '测试3', '测试4', '测试5', ];
foreach($test as $value) {
    View("<h3>$value</h3>");
}
?>
</body>
</html>
