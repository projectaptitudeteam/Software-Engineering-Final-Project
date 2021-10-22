<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/model/db/Database.php";
require_once __DIR__ . "/static/widgets/WidgetFactory.php";


if(empty(session_id())) {
    // Session is not yet initialized
    session_start();
}

$action = filter_input(INPUT_GET, "a", FILTER_UNSAFE_RAW) ?? "0";

$bannerMessage = "";

$sessionTimeoutThreshold = 5 * 60; // 5 minutes * 60 seconds

if(isset($_SESSION["lastUpdateTime"]) && time() - $_SESSION["lastUpdateTime"] > $sessionTimeoutThreshold && isset($_SESSION["username"])) {
    $_SESSION["username"] = null;
    $bannerMessage = "Your session has been idle for too long and has expired. Please login again to access the system.";
} else {
    $_SESSION["lastUpdateTime"] = time();
}

// Requires a user to be logged in
if(!isset($_SESSION["username"]) && $action !== "login" && $action !== "authenticate" && $action !== "register") {
    //User is not logged in, redirect to login page
    echo "<meta http-equiv=\"refresh\" content=\"0;/?c=0&a=login\">";
    exit();
}

$controller = filter_input(INPUT_GET, "c", FILTER_UNSAFE_RAW);
if(empty($controller) || intval($controller) === 0) {
    require_once __DIR__ . "/controller/auth-controller.php";
}
