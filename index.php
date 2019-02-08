<?php 
require_once("autoload.php");
define("_ALLOW_ACCESS", 1);
session_start();
session_regenerate_id();


//********************************************//
//Routing
if(isset($_GET['logout'])){
    require_once("Views/logout.php");
    // require_once("Views/public/login.php");
}
if (isset($_SESSION["user_id"]) && $_SESSION["is_admin"] === true) {
    //admin views should be required here
    $page = isset($_GET['user_id'])? "user" : "users";
    require_once("Views/admin/$page.php");
    exit();
} elseif (isset($_SESSION["user_id"]) && $_SESSION["is_admin"] === false) {
    //members views should be required here
    $page = isset($_GET['edit'])? "edit_my_profile" : "view_my_profile";    
    require_once("Views/member/$page.php");
} else {
    //public views should be required here
    $page = isset($_GET['signup'])? "signup" : "login";    
    require_once("Views/public/$page.php");
}
//********************************************//

?>
