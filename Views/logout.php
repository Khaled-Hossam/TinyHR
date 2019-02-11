<?php

$connection = new MYSQLHandler("users");
$connection->connect();
$stmt = "update users set status = 0 where id = ".$_SESSION['user_id'];
$connection->update($stmt);
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
header('Location: index.php'); 

// exit;
?>