<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query1 = "CREATE TABLE IF NOT EXISTS users_tbl (
  firstname varchar(100) NOT NULL,
  lastname varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  reenteremail varchar(100) NOT NULL,
  password varchar(100) NOT NULL
)"; 
  
  $result = $conn->query($query1);  
   if (!$result) die ("Database access failed: " . $conn->error); 
   
if(isset($_POST['signup']) && isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['email'])&& isset($_POST['reenteremail']) && isset($_POST['password']))
{
	$firstname = mysql_entities_fix_string($conn, $_POST['firstname']);
	echo "";
	$lastname = mysql_entities_fix_string($conn, $_POST['lastname']);
	$email = mysql_entities_fix_string($conn, $_POST['email']);
	$reenteremail = mysql_entities_fix_string($conn, $_POST['reenteremail']);
	$password = mysql_entities_fix_string($conn, $_POST['password']);
	
	
	$stmt = $conn->prepare('INSERT INTO users_tbl VALUES(?,?,?,?,?)');	 
	$stmt->bind_param('sssss',$firstname,$lastname,$email,$reenteremail,$password);
	if($stmt->execute()){
		header('Location:index.php?signup=Registration Sucessful!!Please Login');
	}
	else{
		header('Location:index.php?signup=Email Id or Username is already taken');
	}
	$stmt->close();
	$conn->close();
	
}



function get_post($conn, $var){
  return $conn->real_escape_string($_POST[$var]);
}

function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>