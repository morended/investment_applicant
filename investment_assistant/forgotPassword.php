
<html>
<head>
<script type="text/javascript" src="js/validate.js"></script>	
<meta charset="UTF-8">
<title>Investment Assistant</title>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div id="wrapper">
<form class="" action="checklogin.php" method="post" >
	<div class="headerx">
    </div>
    <div class="header">
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

<div class="content">
<div id="logo">
			<img src="img/investmentAssistant.png" class="logo" alt="Invesment Assistant Logo"/>
    	</div>
        <div class="bodyx">
		</div>

<form  action="index.php?pwdSuccess=Your password has been changed." method=post>
<div class="form-group">
<input type="hidden" value="passwordChange"/>
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Old Password:</label>
    <input type="password" class="form-control" id="oldPassword" name="oldPassword">
  </div>
  <div class="form-group">
     <label for="pwd">New Password:</label>
    <input type="password" class="form-control" id="newPassword" name="newPassword">
  </div>
  <button type="submit" class="btn btn-default">change password</button>



</form>
</div>
</div>
</body>



</html>


