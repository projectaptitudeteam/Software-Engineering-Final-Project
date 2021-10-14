<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = filter_input(INPUT_GET, "c", FILTER_UNSAFE_RAW);
if(empty($controller) || intval($controller) === 0) {
    require_once __DIR__ . "/controller/main-controller.php";
}
