<?php
require_once('./config.php');
require_once('./tool/View.php');
require_once('./tool/MySqlOperation.php');
require_once('./constant.php');
$con = mysql_connect(LOCAlHOST,_ROOT,_PW);
if(!$con) {
    die('Could not connect: ' . mysql_error());
}

if(mysql_query("CREATE DATABASE ht_finance DEFAULT CHARSET utf8 COLLATE utf8_general_ci", $con)){
  echo "Database created";
}else {
  echo "Error creating database: " . mysql_error();
}
mysql_select_db("ht_finance", $con);

$sql1 = "CREATE TABLE person
(
id            int(16) AUTO_INCREMENT,
name          varchar(64),
phone_number  varchar(64),
gain          varchar(64) not null  DEFAULT 0,
pure_gain     varchar(64) not null  DEFAULT 0,
times         varchar(64) not null  DEFAULT 0,
add_time      TIMESTAMP,
PRIMARY       KEY (id)
)";
mysql_query($sql1, $con);

$sql2 = "CREATE TABLE buyer
(
id            int(16) AUTO_INCREMENT,
name          varchar(64),
address       varchar(64),
phone_number  varchar(64),
gain          varchar(64) not null  DEFAULT 0,
pure_gain     varchar(64) not null  DEFAULT 0,
times         varchar(64) not null  DEFAULT 0,
add_time      TIMESTAMP,
PRIMARY KEY (id)
)";
mysql_query($sql2, $con);

$sql3 = "CREATE TABLE provider
(
id            int(16) AUTO_INCREMENT,
name          varchar(64),
address       varchar(64),
phone_number  varchar(64),
pain          varchar(64) not null DEFAULT 0,
times         varchar(64) not null  DEFAULT 0,
production    varchar(64),
add_time      TIMESTAMP,
PRIMARY KEY (id)
)";
mysql_query($sql3, $con);

$sql4 = "CREATE TABLE factory
(
id          	int(16) AUTO_INCREMENT,
name          varchar(64),
address       varchar(64),
phone_number  varchar(64),
pain          varchar(64) not null  DEFAULT 0,
times         varchar(64) not null  DEFAULT 0,
add_time      TIMESTAMP,
PRIMARY       KEY (id)
)";
mysql_query($sql4, $con);

$sql5 = "CREATE TABLE express
(
id           int(16) AUTO_INCREMENT,
name         varchar(64),
address      varchar(64),
phone_number varchar(64),
pain         varchar(64) not null  DEFAULT 0,
times        varchar(64) not null  DEFAULT 0,
add_time TIMESTAMP,
PRIMARY KEY (id)
)";
mysql_query($sql5, $con);

$sql6 = "CREATE TABLE production
(
id          int(16) AUTO_INCREMENT,
name        text,
unit        varchar(64) not null  DEFAULT '(单位)',
gain        varchar(64) not null  DEFAULT 0,
pure_gain   varchar(64) not null  DEFAULT 0,
times       varchar(64) not null  DEFAULT 0,
belong      text,
add_time    TIMESTAMP,
PRIMARY KEY (id)
)";
mysql_query($sql6, $con);

$sql7 = "CREATE TABLE orders
(
id                  int(16) AUTO_INCREMENT,
order_id            int(12),
date                int(16),

buyer               varchar(64),
production_buyer    varchar(64),
number_buyer        varchar(64),
sale_buyer          varchar(64),
money_buyer         varchar(64),
gained_buyer        varchar(64),

provider            varchar(64),
production_provider varchar(64),
number_provider     varchar(64),
sale_provider       varchar(64),
money_provider      varchar(64),
pained_provider     varchar(64),
date_provider       varchar(12),

factory1            varchar(64),
production_factory1 varchar(64),
number_factory1     varchar(64) not null  DEFAULT '0.00',
sale_factory1       varchar(64) not null  DEFAULT '0.00',
money_factory1      varchar(64) not null  DEFAULT '0.00',
type_factory1       varchar(64),
pained_factory1     varchar(64) not null  DEFAULT '0.00',
date_factory1       varchar(12),

factory2            varchar(64),
production_factory2 varchar(64),
number_factory2     varchar(64),
sale_factory2       varchar(64),
money_factory2      varchar(64) not null  DEFAULT '0.00',
type_factory2       varchar(64),
pained_factory2     varchar(64) not null  DEFAULT '0.00', 
date_factory2       varchar(12),

factory3            varchar(64),
production_factory3 varchar(64),
number_factory3     varchar(64) not null  DEFAULT '0.00',
sale_factory3       varchar(64) not null  DEFAULT '0.00',
money_factory3      varchar(64) not null  DEFAULT '0.00',
type_factory3       varchar(64),
pained_factory3     varchar(64) not null  DEFAULT '0.00',
date_factory3       varchar(12), 

factory4            varchar(64),
production_factory4 varchar(64),
number_factory4     varchar(64) not null  DEFAULT '0.00',
sale_factory4       varchar(64) not null  DEFAULT '0.00',
money_factory4      varchar(64) not null  DEFAULT '0.00',
type_factory4       varchar(64),
pained_factory4     varchar(64) not null  DEFAULT '0.00', 
date_factory4       varchar(12),

factory5            varchar(64),
production_factory5 varchar(64),
number_factory5     varchar(64) not null  DEFAULT '0.00',
sale_factory5       varchar(64) not null  DEFAULT '0.00',
money_factory5      varchar(64) not null  DEFAULT '0.00',
type_factory5       varchar(64),
pained_factory5     varchar(64) not null  DEFAULT '0.00', 
date_factory5       varchar(12), 

factory6            varchar(64),
production_factory6 varchar(64),
number_factory6     varchar(64) not null  DEFAULT '0.00',
sale_factory6       varchar(64) not null  DEFAULT '0.00',
money_factory6      varchar(64) not null  DEFAULT '0.00',
type_factory6       varchar(64),
pained_factory6     varchar(64) not null  DEFAULT '0.00', 
date_factory6       varchar(12),

express             varchar(64),
money_express       varchar(64) not null  DEFAULT '0.00',
pained_express      varchar(64) not null  DEFAULT '0.00',
tax int(2),
pure_gain           varchar(64),
person              varchar(64),
state               int(1) default 0,
PRIMARY KEY (id)
)";
mysql_query($sql7, $con);

$sql8 = "CREATE TABLE user
(
id int(16) AUTO_INCREMENT,
username  varchar(64),
password  varchar(64),
PRIMARY   KEY (id)
)";
mysql_query($sql8, $con);

$sql9 = "CREATE TABLE relation
(
id int(16) AUTO_INCREMENT,
production varchar(64),
provider varchar(64),
PRIMARY KEY (id)
)";
mysql_query($sql9, $con);

$sql10 = "CREATE TABLE order_factory
(
id          int(16) AUTO_INCREMENT,
order_id    int(12),
date        int(16),
factory     varchar(64) not null  DEFAULT '',
production  varchar(64) not null  DEFAULT '',
number      varchar(64) not null  DEFAULT '',
sale        varchar(64) not null  DEFAULT '',
money       varchar(64) not null  DEFAULT '',
type        varchar(64) not null  DEFAULT '',
pained      varchar(64) not null  DEFAULT '',
debt        varchar(64) not null  DEFAULT '',
state       int(1) default 0,
PRIMARY KEY (id)
)";
mysql_query($sql10, $con);

$sql11 = "CREATE TABLE order_buyer
(
id          int(16) AUTO_INCREMENT,
order_id    int(12),
date        int(16),
buyer       varchar(64) not null  DEFAULT '',
production  varchar(64) not null  DEFAULT '',
number      varchar(64) not null  DEFAULT '',
sale        varchar(64) not null  DEFAULT '',
money       varchar(64) not null  DEFAULT '',
gained      varchar(64) not null  DEFAULT '',
debt        varchar(64) not null  DEFAULT '',
state       int(1) default 0,
PRIMARY     KEY (id)
)";
mysql_query($sql11, $con);

$sql12 = "CREATE TABLE order_provider
(
id         int(16) AUTO_INCREMENT,
order_id   int(12),
date       int(16),
provider   varchar(64) not null  DEFAULT '',
production varchar(64) not null  DEFAULT '',
number     varchar(64) not null  DEFAULT '',
sale       varchar(64) not null  DEFAULT '',
money      varchar(64) not null  DEFAULT '',
pained     varchar(64) not null  DEFAULT '',
debt       varchar(64) not null  DEFAULT '',
state      int(1) default 0,
PRIMARY    KEY (id)
)";
mysql_query($sql12, $con);

$sql13 = "CREATE TABLE order_person
(
id         int(16) AUTO_INCREMENT,
order_id   int(12),
date       int(16),
person     varchar(64) not null  DEFAULT '',
buyer      varchar(64) not null  DEFAULT '',
production varchar(64) not null  DEFAULT '',
number     varchar(64) not null  DEFAULT '',
sale       varchar(64) not null  DEFAULT '',
money      varchar(64) not null  DEFAULT '',
provider   varchar(64) not null  DEFAULT '',
pure_gain  varchar(64) not null  DEFAULT '',
state      int(1) default 0,
PRIMARY KEY (id)
)";
mysql_query($sql13, $con);

$sql14 = "CREATE TABLE order_express
(
id          int(16) AUTO_INCREMENT,
order_id    int(12),
date        int(16),
express     varchar(64) not null  DEFAULT '',
buyer       varchar(64) not null  DEFAULT '',
provider    varchar(64) not null  DEFAULT '',
production  varchar(64) not null  DEFAULT '',
number      varchar(64) not null  DEFAULT '',
money       varchar(64) not null  DEFAULT '',
pained      varchar(64) not null  DEFAULT '',
debt        varchar(64) not null  DEFAULT '',
state       int(1) default 0,
PRIMARY     KEY (id)
)";
mysql_query($sql14, $con);

$sql15 = "CREATE TABLE order_production
(
id          int(16) AUTO_INCREMENT,
order_id    int(12),
date        int(16),
production  varchar(64) not null  DEFAULT '',
buyer       varchar(64) not null  DEFAULT '',
provider    varchar(64) not null  DEFAULT '',
number      varchar(64) not null  DEFAULT '',
sale        varchar(64) not null  DEFAULT '',
money       varchar(64) not null  DEFAULT '',
pure_gain   varchar(64) not null  DEFAULT '',
state       int(1) default 0,
PRIMARY KEY (id)
)";
mysql_query($sql15, $con);

$Mysql      = new MySqlOperation("ht_finance");
$Mysql -> insert( $USER, ['admin', md5('888888')], 'user');
?>
