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
if(!isset($_SESSION["username"]) && $action !== "login" && $action !== "authenticate" && $action !== "register") {
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
            $username = filter_input(INPUT_POST, "current-username", FILTER_UNSAFE_RAW);
            $password = filter_input(INPUT_POST, "current-password", FILTER_UNSAFE_RAW);
            $role = filter_input(INPUT_POST, "current-role", FILTER_UNSAFE_RAW);

            require_once __DIR__ . "/../model/db/UserDataTable.php";

            if(UserDataTable::authenticateUser($username, $password, $role)) {
                // authenticated
            } else {
                // not authenticated
                $bannerMessage = "An account with that username, password, and role was not found.";
                include_once __DIR__ . "/../view/login.php";
            }


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
    case "register" :
        $pageTitle = "User Registration";
        include_once __DIR__ . "/../static/resource_header.php";

        if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password-validation"])
            && !empty($_POST["role"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"])
            && !empty($_POST["email-address"]) && $_POST["password"] === $_POST["password-validation"]) {

            $username = filter_input(INPUT_POST, "username", FILTER_UNSAFE_RAW);
            $password = filter_input(INPUT_POST, "password", FILTER_UNSAFE_RAW);
            $passwordValidation = filter_input(INPUT_POST, "password-validation", FILTER_UNSAFE_RAW);
            $role = filter_input(INPUT_POST, "role", FILTER_UNSAFE_RAW);
            $firstName = filter_input(INPUT_POST, "firstName", FILTER_UNSAFE_RAW);
            $lastName = filter_input(INPUT_POST, "lastName", FILTER_UNSAFE_RAW);
            $email = filter_input(INPUT_POST, "email-address", FILTER_UNSAFE_RAW);

            require_once __DIR__ . "/../model/obj/User.php";
            $user = new User(0, $username, $password, $firstName, $lastName, "", $role, $email);

            require_once __DIR__ . "/../model/db/UserDataTable.php";
            if(UserDataTable::createUser($user)) {
                echo "Account Created.";
            } else {
                echo "An error occurred while creating an account.";
            }


        } else {
            include_once __DIR__ . "/../view/register_form.php";
        }
        include_once __DIR__ . "/../static/resource_footer.php";
        break;
    default :
        //404
        include_once __DIR__ . "/../static/resource_header.php";
        include_once __DIR__ . "/../view/404.php";
        include_once __DIR__ . "/../static/resource_footer.php";
}