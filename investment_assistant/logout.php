<?php

session_start();

if(isset($_SESSION['firstname'])){ 
echo "session is destroyed";
session_destroy(); 
$_SESSION = array();
header('Location:index.php');
}

?>