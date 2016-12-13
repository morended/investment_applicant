<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/validate.js"></script>	
<meta charset="UTF-8">
<title>Investment Assistant</title>
<link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
/*---------------------------------------*/
/*---------------HEADER------------------*/
/*---------------------------------------*/


<?php
$pwd="";
if(isset($_GET['validation'])){
$validation=$_GET['validation'];
}
else{
	$validation="";
}
if(isset($_GET['pwdSuccess'])){
	$pwd=$_GET['pwdSuccess'];
	$email=$_POST['email'];
	
	$newPassword=$_POST['newPassword'];
	$oldPassword=$_POST['oldPassword'];
	
	echo $pwd. "hello".$email.":".$newPassword.":".$oldPassword;

	
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM users_tbl WHERE email='$email' and password='$oldPassword'";
echo $query;
	$result = $conn->query($query);
if(!$result) die ("Database access failed: ". $conn->error);
$rows = $result -> num_rows;
if($rows>0){
	echo "rows greater than 0";
	$query="update users_tbl set password='$newPassword' where email='$email'";
	 $result = $conn->query($query);
        if (!$result) die ("Database access failed: " . $conn->error);

}
else{
	$pwd="Incorrect email or password";
}
}


?>
<form class="" action="checklogin.php" onsubmit="return(validate(this));" method="post" >
	<div class="headerx">
	
    </div>
    <div class="header">
	<div id="validation" style="float:right;padding-right:100px"><?php  echo $pwd ?><?php  echo $validation?> </div>
    </div>
    <div id="about" class="header">
    	
    </div>
	
	    <div id="form1" class="header">Email or Username<br>
		 
    	<input placeholder="Email" type="text" name="firstname" /><br>
        <div style="padding-top:5px"><input type="checkbox"/>Keep me logged in</div>
    </div>
    <div id="form2" class="header">Password<br>
    	<input placeholder="Password" type="password" name="password" /><br>
       <div style="padding-top:7px"> <a href="forgotPassword.php" >Forgotten my password</a></div>
    </div>
    <input type="submit" class="submit1" name="login" value="login"/>
</form>
/*---------------------------------------*/
/*----------------BODY-------------------*/
/*---------------------------------------*/
    <div class="content">
    	<div id="logo">
			<img src="img/investmentAssistant.png" class="logo" alt="Invesment Assistant Logo"/>
    	</div>
        <div class="bodyx">
		
			<label id="demo" style="color:red"> </label>
			<label id="success" style="color:green;font-size:30px"><?php if(isset($_GET['signup'])) echo $_GET['signup'];?></label>
			
    	</div>
        <div>
		 <form action="registration.php" method="post" onsubmit="return(registrationValidate(this));">
        	<div id="form3" class="bodyx">
			
            	<label>
            		<input placeholder="First Name" type="text" name="firstname" id="namebox1" name="name1"/>
                </label>
                <label>
                	<input placeholder="Last Name" type="text" name="lastname" id="namebox2"/><br>
                </label>
                <label>
					<input placeholder="Email" type="email" name="email" id="mailbox"/><br>
                </label>
                <label>
					<input placeholder="Re-enter email" type="email" name="reenteremail" id="mailbox"/><br>
                </label>
                <label>
					<input placeholder="Password" type="password" name="password" id="mailbox"/><br>
                </label>
                <label>
                	<p>By Creating an account, you are agreeing to our Terms.</p><br>
                </label>
                <input type="submit" id="button2" name="signup" value="Sign Up"/>
            </div>
			
			</form>
			
        </div>
    </div>
 </div>
</body>
</html>
