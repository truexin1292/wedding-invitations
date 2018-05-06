<?php
/*
 * 数据库操作*（创建数据库，表，插入数据，插入多条数据）
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
//先连接数据库
$servername="localhost:3306";
$username="root";
$userpassword="123456";
$dbname="wedding";

$connent=new mysqli($servername,$username,$userpassword);

//创建数据库
$createdatabase="create database wedding";
if($connent->query($createdatabase)==true){
	echo "创建数据库wedding成功"."<br>";
}else{
	echo "Error creating database: " . $connent->error."<br>";
}

$connent=new mysqli($servername,$username,$userpassword,$dbname);
if($connent->connect_error){
	die("连接数据库失败: " . $connent->connect_error)."<br>";
}else{
	echo "连接数据库成功"."<br>";
}

//创建表  原生的建表语句 id自增唯一  name text ip create_time
$createtable="create table bless(
	id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name varchar(24) DEFAULT NULL,
	text varchar(255) DEFAULT NULL,
	ip varchar(32) DEFAULT NULL,
	create_time datetime default now()
)";
if($connent->query($createtable)==true){//执行
	echo "创建表bless成功"."<br>";
}else{
	echo "Error creating table: " . $connent->error."<br>";
}

//插入数据
$insertdata="insert into bless(name,text) values('truexin','I love u')";
if($connent->query($insertdata)==true){
	echo "插入数据成功"."<br>";
}else{
	echo "Error insert data: " . $connent->error."<br>";
}
//也可以如下这么写 也比较简单一些
/*if (mysqli_query($connent, $insertdata)) {
    echo "插入数据成功";
} else {
    echo "Error insert data: " . $connent->error;
}*/
//插入多条数据
$insertdatas="insert into bless(name,text) values('test1','1.com');";
$insertdatas .="insert into bless(name,text) values('tes2','2.com');";
$insertdatas .="insert into bless(name,text) values('test3','3.com')";
if ($connent->multi_query($insertdatas)==true) {
    echo "插入多条数据成功"."<br>";
} else {
    echo "Error insert datas: " . $connent->error."<br>";
}
//关闭数据库
mysqli_close($connent);
?>
