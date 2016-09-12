<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./constant.php');
require_once('./layout/Header.php');
?>
<div class = ''>
    <div class = 'ds-full-screen'>
        <div class = 'ds-slide-bar'>
            <div class = 'ds-slide-content'>
                <div class = 'ds-bar-head '></div>
                <div class = 'ds-bar-item ds-bar-active'><a>L</a></div>
                <div class = 'ds-bar-item'><a>A</a></div>   
            </div>
        </div>
        <div class = 'ds-slide-rest' >
            <h3>财务订单查看</h3>
            <table class = 'ds-table'>
                <tr class="ds-first-tr">
                    <td>日期</td>
                    <td>客户</td>
                    <td>产品</td>
                    <td>数量</td>
                    <td>单价</td>
                    <td>供货商</td>
                    <td>加工厂</td>
                    <td>物流</td>
                    <td>税率</td>
                    <td>利润</td>
                    <td>状态</td>
                </tr>
                <tr>
                    <td>20160909</td>
                    <td>广东赵先生</td>
                    <td>304长棒222*222（件）</td>
                    <td>1200</td>
                    <td>11</td>
                    <td>1200</td>
                    <td>100/200/100/200/200/100</td>
                    <td>100</td>
                    <td>11</td>
                    <td>12000</td>
                    <td>未处理/已处理/未通过</td>
                </tr>
            </table>
            
        </div>
    </div>
</div>


<script>
    $(function() {
       $(' .ds-full-screen ').css('height', $(window).height());
    });
</script>
<?php
require_once('./layout/Footer.php');
?>
