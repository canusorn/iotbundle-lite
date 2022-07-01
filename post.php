<?php

require "classes/Temp.php";

$_POST = json_decode(file_get_contents('php://input'), true);

var_dump($_POST);

// file_put_contents('var_dump.log', "t:" . $_POST['temp'] . ", h:" . $_POST['humid'] . "\n", FILE_APPEND);

date_default_timezone_set('Asia/Bangkok');
$dateTime = new DateTime();

$data=new Temp();
$data->temp= $_POST['temp'];
$data->humid= $_POST['humid'];
$data->time=$dateTime->format('Y-m-d H:i:s');

$data->createTables();
$data->insert();