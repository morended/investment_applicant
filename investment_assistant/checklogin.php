<?php
require_once 'login.php';  
$conn = new mysqli($hn, $un, $pw, $db); 
 if ($conn->connect_error) die($conn->connect_error);

 if(isset($_POST['login']) && isset($_POST['firstname']) && isset($_POST['password']))
{
$username = mysql_entities_fix_string($conn, $_POST['firstname']);
$password = mysql_entities_fix_string($conn, $_POST['password']);

	
	$query = "SELECT * FROM users_tbl WHERE firstname='$username'";
	$result = $conn->query($query);
	if(!$result) die ("Database access failed: ". $conn->error);

	$rows = $result -> num_rows;
	echo "rows".$rows;
	if($rows>0){
	
		
		$result->data_seek(0);
		$row = $result->fetch_array(MYSQLI_NUM);
		if($username == $row[0] && $password == $row[4]){
			session_start();
			$_SESSION['firstname']=$_POST['firstname'];
		
				header('Location:about.php');
		}
		
		else 
			{
			

				header('Location:index.php?validation=Wrong Password Try Again');
			}
	
	}
	else{
		header('Location:index.php?validation=Please Enter a valid Username and Password  ');
	}
	   
}

function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}
?>

