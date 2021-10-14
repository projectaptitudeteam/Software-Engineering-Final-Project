<?php

if(empty(session_id())) {
    // Session is not yet initialized
    session_start();
}

$action = filter_input(INPUT_GET, "a", FILTER_UNSAFE_RAW) ?? "0";

$sessionTimeoutThreshold = 5 * 60; // 5 minutes * 60 seconds

if(isset($_SESSION["lastUpdateTime"]) && time() - $_SESSION["lastUpdateTime"] > $sessionTimeoutThreshold) {
    $_SESSION["username"] = null;
    $bannerMessage = "Your session has been idle for too long and has expired. Please login again to access the system.";
} else {
    $_SESSION["lastUpdateTime"] = time();
}


// Requires a user to be logged in
if(!isset($_SESSION["username"]) && $action !== "login" && $action !== "authenticate") {
    //User is not logged in, redirect to login page
    echo "<meta http-equiv=\"refresh\" content=\"0;/?c=0&a=login\">";
    exit();
}


switch ($action) {
    case "1" :
        include_once __DIR__ . "/../static/resource_header.php";
        include_once __DIR__ . "/../view/1.php";
        include_once __DIR__ . "/../static/resource_footer.php";
        break;
    case "authenticate" :
        include_once __DIR__ . "/../static/resource_header.php";
        if(!empty($_POST["current-username"]) && !empty($_POST["current-password"]) && !empty($_POST["current-role"])) {
            // Authenticate with the DB

        } else {
            $error_current_username = empty($_POST["current-username"]) ? "Username is Required" : "";
            $error_current_password = empty($_POST["current-password"]) ? "Password is Required" : "";
            $error_current_role = empty($_POST["current-role"]) ? "User Role is Required" : "";
            include_once __DIR__ . "/../view/login.php";
        }
        include_once __DIR__ . "/../static/resource_footer.php";
        break;
    case "login" :
        $pageTitle = "Login";
        include_once __DIR__ . "/../static/resource_header.php";
        include_once __DIR__ . "/../view/login.php";
        include_once __DIR__ . "/../static/resource_footer.php";
        break;
    default :
        //404
        include_once __DIR__ . "/../static/resource_header.php";
        include_once __DIR__ . "/../view/404.php";
        include_once __DIR__ . "/../static/resource_footer.php";
}