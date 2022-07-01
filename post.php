<?php

$_POST = json_decode(file_get_contents('php://input'), true);

var_dump($_POST);

file_put_contents('var_dump.log', "t:" . $_POST['temp'] . ", h:" . $_POST['humid'] . "\n", FILE_APPEND);