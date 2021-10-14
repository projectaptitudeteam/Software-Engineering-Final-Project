<?php
header("Content-Type: Application/JavaScript");
header("Access-Control-Allow-Origin: *");

$obj = new stdClass();

$obj->status = "200 - OK";

echo json_encode($obj);

