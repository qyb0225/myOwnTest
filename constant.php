<?php
$PERSON_CH = ['负责人','联系方式','营业额','净利润','订单量','添加时间'];
$PERSON_EN = ['name','phone_number','gain','pure_gain','times','add_time'];

$BUYER_CH = ['客户','地址','联系方式','营业额','净利润','订单量','添加时间'];
$BUYER_EN = ['name','address','phone_number','gain','pure_gain','times','add_time'];

$PROVIDER_CH = ['供货商','地址','联系方式','交易额','订单量','添加时间'];
$PROVIDER_EN = ['name','address','phone_number','pain','times','add_time'];

$FACTORY_CH = ['加工厂','地址','联系方式','交易额','订单量','添加时间'];
$FACTORY_EN = ['name','address','phone_number','pain','times','add_time'];

$EXPRESS_CH = ['物流','地址','联系方式','交易额','订单量','添加时间'];
$EXPRESS_EN = ['name','address','phone_number','pain','times','add_time'];

$PRODUCTION_CH = ['产品','最小单位','营业额','净利润','订单量','所属','添加时间'];
$PRODUCTION_EN = ['name','unit','gain','pure_gain','times','belong','add_time'];


$ORDERS_OPERATION_CH = [
    '日期', '客户', '产品', '数量', '单价', '金额', '已收',
    '供应商', '产品', '数量', '单价', '金额', '已付', '日期',
    '加工单位一', '产品', '数量', '单价', '金额', '加工类型', '已付', '日期', 
    '加工单位二', '产品', '数量', '单价', '金额', '加工类型', '已付', '日期', 
    '加工单位三', '产品', '数量', '单价', '金额', '加工类型', '已付', '日期', 
    '加工单位四', '产品', '数量', '单价', '金额', '加工类型', '已付', '日期', 
    '加工单位五', '产品', '数量', '单价', '金额', '加工类型', '已付', '日期', 
    '加工单位六', '产品', '数量', '单价', '金额', '加工类型', '已付', '日期', 
    '物流', '物流金额', '已付', 
    '税率', '净利润', '负责人'
];
$ORDERS_OPERATION_EN = [
    'order_id', 'date',
    'buyer','production_buyer', 'number_buyer', 'sale_buyer', 'money_buyer', 'gained_buyer',
    'provider','production_provider', 'number_provider', 'sale_provider', 'money_provider', 'pained_provider', 'date_provider',
    'factory1','production_factory1', 'number_factory1', 'sale_factory1', 'money_factory1', 'type_factory1', 'pained_factory1', 'date_factory1',
    'factory2','production_factory2', 'number_factory2', 'sale_factory2', 'money_factory2', 'type_factory2', 'pained_factory2', 'date_factory2',
    'factory3','production_factory3', 'number_factory3', 'sale_factory3', 'money_factory3', 'type_factory3', 'pained_factory3', 'date_factory3',
    'factory4','production_factory4', 'number_factory4', 'sale_factory4', 'money_factory4', 'type_factory4', 'pained_factory4', 'date_factory4',
    'factory5','production_factory5', 'number_factory5', 'sale_factory5', 'money_factory5', 'type_factory5', 'pained_factory5', 'date_factory5',
    'factory6','production_factory6', 'number_factory6', 'sale_factory6', 'money_factory6', 'type_factory6', 'pained_factory6', 'date_factory6',
    'express','money_express', 'pained_express',
    'tax','pure_gain', 'person'
];

$ORDERS_CH = [
    '编号','日期','客户','产品','单价','金额(元)','供应商','加工一','加工二','加工三','加工四','加工五','加工六','物流','税率','净利润(元)','负责人'
];
$ORDERS_EN = [
    'date','buyer','production_buyer','sale_buyer','money_buyer','money_provider',
    'money_factory1','money_factory2','money_factory3','money_factory4','money_factory5','money_factory6',
    'money_express','tax','pure_gain','person'
];

$ORDERS_TITLE_EN = [
    '','','','number_buyer','','provider',
    'factory1','factory2','factory3','factory4','factory5','factory6',
    'express','','',''
];

$ADDITIONID = ['person','buyer','provider','factory','production','express'];
    $PERSON_ADDITION_CH     = ['负责人*','联系方式','初始营业额','初始净利润','初始订单量'];
    $BUYER_ADDITION_CH      = ['客户*','地址','联系方式','初始营业额','初始净利润','初始订单量'];
    $FACTORY_ADDITION_CH    = ['加工厂*','地址','联系方式','初始交易额','初始订单量'];
    $PROVIDER_ADDITION_CH   = ['供应商*','地址','联系方式','初始交易额','初始订单量'];
    $EXPRESS_ADDITION_CH    = ['物流*','地址','联系方式','初始交易额','初始订单量'];
    $PRODUCTION_ADDITION_CH = ['产品*','最小单位*','初始营业额','初始净利润','初始订单量','所属供应商'];

$ORDER_BUYER = [
    'order_id', 'date', 'buyer', 'production', 'number', 'sale', 'money', 'gained', 'debt'
];
$ORDER_PROVIDER = [
    'order_id', 'date', 'provider', 'production', 'number', 'sale',  'money', 'pained', 'debt', 'date_provider'
];
$ORDER_EXPRESS = [
    'order_id', 'date', 'express', 'buyer', 'provider', 'production', 'number', 'money', 'pained', 'debt'
];
$ORDER_FACTORY = [
    'order_id', 'date', 'factory', 'production', 'number', 'sale', 'money', 'type', 'pained', 'debt', 'date_factory'
];
$ORDER_PERSON = [
    'order_id', 'date', 'person', 'buyer', 'provider', 'production', 'number', 'sale', 'money', 'pure_gain'
];
$ORDER_PRODUCTION = [
    'order_id', 'date', 'production', 'buyer', 'provider', 'number', 'sale', 'money', 'pure_gain'
];
$USER = [
    'username', 'password'
];
?>
