<?php

require_once './Bless.php';
$pdo = new PDO("mysql:host=localhost:3306;dbname=wedding", "root", "123456");
$pdo->query("SET NAMES utf8");

$rs = $pdo->query("select * from bless order by id desc");

$result = array();

while ($row = $rs->fetch()) {
    $bless = new Bless($row);
    array_push($result, $bless);
}

echo json_encode($result);
