<?php

require "classes/Temp.php";

$data = Temp::getLast();

echo json_encode($data);